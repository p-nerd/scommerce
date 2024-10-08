<?php

namespace App\Http\Controllers\Store;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Events\OrderPlaced;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Location;
use App\Models\Order;
use App\Models\OrderItem;
use DGvai\SSLCommerz\SSLCommerz;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if (! count($user->carts)) {
            return redirect()
                ->route('products')
                ->with('error', 'The cart id empty');
        }

        $divisions = Location::query()
            ->with('districts')
            ->where('division_id', null)
            ->get();

        return view('store/checkout/index', [
            'user' => $user,
            'carts' => $request->user()->carts()->with('product.images')->get(),
            'subtotal' => Cart::totalPrice(),
            'divisions' => $divisions,
        ]);
    }

    public function coupon(Request $request)
    {
        $payload = $request->validate([
            'coupon' => ['required', 'string'],
            'total' => ['required'],
        ]);

        $coupon = Coupon::where('code', $payload['coupon'])->first();
        if (! $coupon?->valid()) {
            return response()->json(['message' => 'Coupon is invalid'], 400);
        }

        return [
            'amount' => $coupon->amount($payload['total']),
        ];
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'coupon' => ['nullable', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', 'regex:/^\d+$/'],
            'division' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'landmark' => ['nullable', 'string', 'max:255'],
            'payment_method' => ['required', 'string', 'in:'.implode(',', PaymentMethod::values())],
        ]);

        $carts = $request->user()->carts()->with('product')->get();
        $subtotal = $carts->sum(function ($item) {
            return ($item->product->discount_price ?? $item->product->price) * $item->quantity;
        });

        $coupon = null;
        $discount = 0;
        if ($payload['coupon']) {
            $coupon = Coupon::where('code', $payload['coupon'])->first();
            if ($coupon?->valid()) {
                $discount = $coupon->amount($subtotal);
            }
        }

        $delivery = Location::query()
            ->where('division_id', '!=', null)
            ->where('value', $payload['district'])
            ->first()?->price ?? 0;

        $total = $subtotal - $discount + $delivery;

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => $request->user()->id,
                'coupon_id' => $coupon ? $coupon->id : null,
                'name' => $payload['name'],
                'email' => $request->user()->email,
                'phone' => $payload['phone'],
                'division' => $payload['division'],
                'district' => $payload['district'],
                'address' => $payload['address'],
                'landmark' => $payload['landmark'],
                'subtotal' => $subtotal,
                'discount' => $discount,
                'delivery' => $delivery,
                'total' => $total,
                'payment_method' => PaymentMethod::from($payload['payment_method']),
            ]);

            foreach ($carts as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->discount_price ?? $item->product->price,
                ]);
            }

            if ($order->payment_method === PaymentMethod::CASH_ON_DELIVERY) {
                $request->user()->carts()->delete();
                event(new OrderPlaced(Order::with('orderItems.product')->find($order->id)));

                return to_route('account.orders.show', $order)->with('success', 'Order placed successfully!');
            }

            $sslc = new SSLCommerz;
            $sslc->amount($order->total)
                ->trxid($order->id)
                ->product('Scommerce Product')
                ->customer($order->name, $order->user->email);

            return $sslc->make_payment();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Order creation failed: '.$e->getMessage());

            return back()->with('error', 'There was an error processing your order. Please try again.');
        } finally {
            DB::commit();
        }
    }

    public function success(Request $request)
    {
        if (! SSLCommerz::validate_payment($request)) {
            return to_route('checkout')->with('error', 'Payment is valid, please try again');
        }
        $orderId = $request->tran_id;
        $bankTranID = $request->bank_tran_id;

        $order = Order::query()
            ->with('orderItems.product')
            ->find($orderId);

        if (! $order) {
            return to_route('checkout')->with('error', 'Order is not found to process, please try again');
        }

        $order->update([
            'paid' => true,
            'bank_tran_id' => $bankTranID,
            'status' => OrderStatus::PROCESSING,
        ]);

        $order->user->carts()->delete();

        event(new OrderPlaced($order));

        return to_route('account.orders.show', $order);
    }

    public function failure()
    {
        return to_route('checkout')->with('error', 'The payment is failed, please try again');
    }

    public function cancel()
    {
        return to_route('checkout')->with('error', 'The payment is cancel, please try again');
    }

    public function ipn()
    {
        //
    }
}
