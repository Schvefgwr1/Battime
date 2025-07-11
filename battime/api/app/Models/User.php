<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="Establishment",
 *     ),
 *     @OA\Property (
 *         property="name",
 *         type="string",
 *         description="User nickname"
 *     ),
 *     @OA\Property (
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="User`s email address"
 *     ),
 *     @OA\Property (
 *         property="password",
 *         type="string",
 *         description="User`s hash-function password"
 *     ),
 *     @OA\Property (
 *         property="Users_NumberPhone",
 *         type="integer",
 *         description="User`s number of phone"
 *     ),
 *     @OA\Property (
 *         property="Sms_User_Sent",
 *         type="integer",
 *         description="Last sent to user sms"
 *     )
 * )
 */

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_lastname',
        'email',
        'password',
        'Users_NumberPhone',
        'Sms_User_Sent',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function UserVisitor(){
        return $this->hasOne(UserVisitor::class);
    }
    public function likedEstablishments()
    {
        return $this->belongsToMany(Establishment::class, 'likes', 'user_id', 'establishment_id');
    }


}
