<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'color_product_id', 'path'
    ];

    /**
     * Get ColorProduct  Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colorProducts()
    {
        return $this->belongsTo(App\Models\ColorProduct, 'color_product_id', 'id');
    }
}
