<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Establishment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     title="Filters",
 *     description="Filters of establishment model",
 *     @OA\Xml(
 *         name="Filters",
 *     ),
 *     @OA\Property (
 *         property="rock",
 *         type="boolean",
 *         description="Rock music"
 *     ),
 *     @OA\Property (
 *         property="pop",
 *         type="boolean",
 *         description="Pop music"
 *     ),
 *     @OA\Property (
 *         property="K_pop",
 *         type="boolean",
 *         description="K pop music"
 *     ),
 *     @OA\Property (
 *         property="Techno",
 *         type="boolean",
 *         description="Techno music"
 *     ),
 *     @OA\Property (
 *         property="Rap",
 *         type="boolean",
 *         description="Rap music"
 *     ),
 *     @OA\Property (
 *         property="Hip_hop",
 *         type="boolean",
 *         description="Hip hop music"
 *     ),
 *     @OA\Property (
 *         property="Vodka",
 *         type="boolean",
 *         description="Establishments with vodka"
 *     ),
 *     @OA\Property (
 *         property="Tequila",
 *         type="boolean",
 *         description="Establishments with tequila"
 *     ),
 *     @OA\Property (
 *         property="Label",
 *         type="boolean",
 *         description="Establishments with label"
 *     ),
 *     @OA\Property (
 *         property="Wine",
 *         type="boolean",
 *         description="Establishments with wine"
 *     ),
 *     @OA\Property (
 *         property="American",
 *         type="boolean",
 *         description="Establishments with american food"
 *     ),
 *     @OA\Property (
 *         property="Georgian",
 *         type="boolean",
 *         description="Establishments with georgian food"
 *     ),
 *     @OA\Property (
 *         property="German",
 *         type="boolean",
 *         description="Establishments with german food"
 *     ),
 *     @OA\Property (
 *         property="Vegan",
 *         type="boolean",
 *         description="Establishments with vegan food"
 *     ),
 *     @OA\Property (
 *         property="Dollar1",
 *         type="boolean",
 *         description="Establishments with low price"
 *     ),
 *     @OA\Property (
 *         property="Dollar2",
 *         type="boolean",
 *         description="Establishments with middle price"
 *     ),
 *     @OA\Property (
 *         property="Dollar3",
 *         type="boolean",
 *         description="Establishments with high price"
 *     ),
 *     @OA\Property (
 *         property="Bar",
 *         type="boolean",
 *         description="Bars"
 *     ),
 *     @OA\Property (
 *         property="Cafe",
 *         type="boolean",
 *         description="Cafe"
 *     ),
 *     @OA\Property (
 *         property="Club",
 *         type="boolean",
 *         description="Clubs"
 *     ),
 *     @OA\Property (
 *         property="Restaurant",
 *         type="boolean",
 *         description="Restaurants"
 *     ),
 *     @OA\Property (
 *         property="Modern",
 *         type="boolean",
 *         description="Establishments with modern style"
 *     ),
 *     @OA\Property (
 *         property="Faint",
 *         type="boolean",
 *         description="Establishments with faint style"
 *     ),
 *     @OA\Property (
 *         property="Avaliable",
 *         type="boolean",
 *         description="Establishments for dancing with free entrance"
 *     ),
 *     @OA\Property (
 *         property="Not_Avaliable",
 *         type="boolean",
 *         description="Establishments for dancing with private entrance"
 *     ),
 *     @OA\Property (
 *         property="Indoor",
 *         type="boolean",
 *         description="Indoor establishments for dancing"
 *     ),
 *     @OA\Property (
 *         property="Outdoor",
 *         type="boolean",
 *         description="Outdoor establishments for dancing"
 *     ),
 * )
 */

class Filters extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table ='filter_establishments';
    protected $fillable = [
        'establishment_id',
        'id',
        'ROCK',
        'POPA',
        'KPOP',
        'TECH',
        'RAP1',
        'HIPH',
        'VODK',
        'TEQU',
        'LABE',
        'WINE',
        'AMER',
        'GEOR',
        'GERM',
        'Vegan',
        'Dollar1',
        'Dollar2',
        'Dollar3',
        'Bar',
        'Cafe',
        'Club',
        'Restaurant',
        'Modern',
        'Classic',
        'High_tech',
        'Loud',
        'Moderate',
        'Faint',
        'Available',
        'Not_available',
        'Indoor',
        'Outdoor',
    ];

    public function establishment(): BelongsTo
    {
        return $this->belongsTo(Establishment::class);
    }
}
