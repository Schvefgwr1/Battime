<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *     title="Menu_links",
 *     description="Table of menu links",
 *     @OA\Xml(
 *         name="Establishment",
 *     ),
 *     @OA\Property (
 *         property="establishment_id",
 *         type="integer",
 *         description="ID of establishment that this menu"
 *     ),
 *     @OA\Property (
 *         property="list_number",
 *         type="integer",
 *         description="Number of menu`s list"
 *     ),
 *     @OA\Property (
 *         property="link_to_menu_photo",
 *         type="string",
 *         description="Link to photo of page of menu"
 *     )
 * )
 */

class MenuLinks extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table ='menu_links';
    //передаются через запросы
    protected $visible = [
        'establishment_id',
        'list_number',
        'link_to_menu_photo',
        'id'
    ];

}
