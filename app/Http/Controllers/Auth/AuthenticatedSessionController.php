<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyRequest;
use App\Models\User;
use App\Notifications\VerificationCodeNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): View
    {
        $payload = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable'],
        ]);

        $user = User::where('email', $payload['email'])->first();

        if (! $user || ! Hash::check($payload['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $verificationCode = $user->generateVerificationCode();
        $user->notify(new VerificationCodeNotification($verificationCode));

        return view('auth/auth-verify', [
            'email' => $payload['email'],
            'password' => $payload['password'],
            'remember' => $payload['remember'] ?? false,
            'duration' => config('auth.verification.duration') * 60 * 1000,
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function verify(VerifyRequest $request): RedirectResponse
    {
        $enteredCode = $request->code_1.$request->code_2.$request->code_3.$request->code_4;
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }

        if (! $user->compareVerificationCode($enteredCode)) {
            return back()->withErrors(['code' => 'The verification code is incorrect.']);
        }

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
