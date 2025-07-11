<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use App\Notifications\Send2FAnotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *     title="SuperAdmin",
 *     description="Super admin model",
 *     @OA\Xml(
 *         name="SuperAdmin"
 *     )
 * )
 */
class SuperAdmin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * @OA\Property(property="name", type="string", example="Seva")
     * @OA\Property(property="user_lastname", type="string", example="front")
     * @OA\Property(property="email", type="string", format="email", example="seva.front@example.com")
     * @OA\Property(property="Users_NumberPhone", type="string", example="+79999999999")
     */
    protected $fillable = ['name', 'user_lastname', 'email', 'password', 'Users_NumberPhone'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     * @OA\Property(property="email_verified_at", type="string", format="date-time", example="2023-01-01T00:00:00.000Z")
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    /**
     * Send the 2FA notification to the user.
     *
     * @param string $twoFactorCode Two-factor authentication code
     */
    public function send2FANotification($twoFactorCode): void
    {
        $this->notify(new Send2FAnotification($twoFactorCode));
    }
}

