<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminEstablishment extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPasswordTrait;
    protected $fillable = [
        'name',
        'user_lastname',
        'email',
        'password',
        'admin_numberphone',
        'password_created_at',

    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_created_at' => 'datetime',
    ];
    public function registeredEstablishments()
    {
        return $this->belongsToMany(RegisteredEstablishments::class, 'admin_establishment_registered_establishment');
    }
    public function sendPasswordResetNotification($token) {
        $url = env('RESET_PASSWORD_LINK') . '/reset-password?email=' . $this->email . '&token='.$token;
        $this->notify(new PasswordResetNotification($url));
    }
}
