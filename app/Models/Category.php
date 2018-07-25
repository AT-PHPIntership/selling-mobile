<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
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
        return $this->hasMany(App\Models\Product, 'category_id', 'id');
    }
}
