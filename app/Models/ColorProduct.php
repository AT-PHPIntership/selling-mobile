<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    public $timestamps = false;
    protected $table = 'color_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'product_id', 'color', 'path_image', 'quantity', 'price_color_value', 'price_color_type'];

    /**
     * Get Product Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
