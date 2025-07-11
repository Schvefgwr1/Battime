<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *     title="Establishment",
 *     description="Establishment model",
 *     @OA\Xml(
 *         name="Establishment",
 *     ),
 *     @OA\Property (
 *         property="name",
 *         type="string",
 *         description="Establishment name"
 *     ),
 *     @OA\Property (
 *         property="likes",
 *         type="integer",
 *         description="Establishment`s number of likes"
 *     ),
 *     @OA\Property (
 *         property="workload_parameter",
 *         type="integer",
 *         description="Establishment`s occupancy percentage"
 *     ),
 *     @OA\Property (
 *         property="link_to_emoji",
 *         type="string",
 *         description="Establishment`s emoji in map"
 *     ),
 *     @OA\Property (
 *         property="address_latitude",
 *         type="number",
 *         description="Establishment`s coordinate"
 *     ),
 *     @OA\Property (
 *         property="address_longitude",
 *         type="number",
 *         description="Establishment`s coordinate"
 *     )
 * )
 */

class Establishment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $table ='establishments';
    //передаются через запросы
    protected $visible = [
        'id',

        'name',
        'likes',
        'workload_parameter',

        'link_to_emoji',

        'address_latitude',
        'address_longitude',
        'address',
    ];
    //запрещаем заполнять
    protected $guarded = [
    ];
    public static function scopeFilteredBy($query, $filterIds)
    {
        return $query->whereHas('Filters', function ($query) use ($filterIds) {
            $query->whereIn('id', $filterIds);
        });
    }
    public function Filters(): BelongsToMany
    {
        return $this->belongsToMany(
            FiltersCategory::class,
            'filter_category_establishment_relation',
            'establishment_id',
            'filter_category_id',
            'id',
            'id_filt'
        );
    }
    public function registeredEstablishments()
    {
        return $this->hasMany(RegisteredEstablishments::class);
    }
    public function scopeSearchByName($query, $name) {
        return $query->where('name', 'LIKE', "%$name%");
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'establishment_id', 'user_id');
    }


}
