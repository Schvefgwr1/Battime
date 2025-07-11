<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiltersCategory extends Model
{
    use HasFactory;
    protected $table = 'filter_category';
    /**
     * @var string[]
     */
    protected $visible = [
        'id_filt',
        'mame_filter',
        'category_filter'
    ];

    public function Establishments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Establishment::class,
            'filter_category_establishment_relation',
            'filter_category_id',
            'establishment_id'
        );
    }
}
