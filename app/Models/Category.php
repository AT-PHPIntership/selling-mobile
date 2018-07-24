<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    /**
     * Relationship hasMany with Like
     *
     * @return array
     */
    public function products()
    {
        return $this->hasMany(App\Models\Product, 'product_id', 'id');
    }
}
