<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="RegisteredEstablishments",
 *     description="Registered establishment model",
 *     @OA\Xml(
 *         name="Establishment",
 *     ),
 *     @OA\Property(
 *         property="establishment_likes",
 *         type="string",
 *         description="Establishment`s link to logo",
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Text information",
 *     ),
 *     @OA\Property(
 *         property="establishment_email",
 *         type="string",
 *         format="email",
 *     ),
 *     @OA\Property(
 *         property="establishment_inst",
 *         type="string",
 *     ),
 *     @OA\Property(
 *         property="establishment_vk",
 *         type="string",
 *     ),
 *     @OA\Property(
 *         property="establishment_telegram",
 *         type="string",
 *    ),
 *    @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         description="Email for account of establishment"
 *    ),
 *    @OA\Property(
 *         property="password",
 *         type="string",
 *         description="Password for account of establishment"
 *    ),
 * )
 */

class RegisteredEstablishments extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table ='registered_establishments';
    protected $visible = [
        'likes',
        'workload_parameter',
        'contact_email',
        'contact_vk',
        'contact_inst',
        'contact_tg',
        'link_to_avatar',
        'link_logo',
        'description',
    ];
    protected $fillable = [
        'workload_parameter',
        'contact_email',
        'contact_vk',
        'contact_inst',
        'contact_tg',
        'link_to_avatar',
        'link_logo',
        'description',
        'likes',
    ];
    public function adminEstablishments()
    {
        return $this->belongsToMany(AdminEstablishment::class, 'admin_establishment_registered_establishment');
    }
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }


}
