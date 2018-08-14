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
        'product_id', 'path_image'
    ];

    /**
     * Get ColorProduct  Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colorProducts()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
