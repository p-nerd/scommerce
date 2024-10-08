<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'role',
        'avatar',
        'password',
        'phone',
        'division',
        'district',
        'address',
        'shipping_phone',
        'shipping_division',
        'shipping_district',
        'shipping_address',
        'shipping_landmark',
        'status',
        'two_factor_code',
        'two_factor_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'role' => UserRole::class,
            'password' => 'hashed',
            'status' => UserStatus::class,
            'email_verified_at' => 'datetime',
        ];
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function admin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    protected function verificationCodeKey(): string
    {
        return 'verification_code_'.$this->id;
    }

    public function generateVerificationCode()
    {
        $verificationCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        Cache::put(
            $this->verificationCodeKey(),
            $verificationCode,
            now()->addMinutes(config('auth.verification.duration'))
        );

        return $verificationCode;
    }

    public function compareVerificationCode(string $code)
    {
        $cacheKey = $this->verificationCodeKey();
        if (Cache::get($cacheKey) !== $code) {
            return false;
        }
        Cache::forget($cacheKey);

        return true;
    }
}
