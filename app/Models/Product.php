<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'manufacturing_date', 'price', 'producer', 'detail', 'description', 'category_id'
    ];

    /**
     * Get Reviews of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'product_id', 'id');
    }

    /**
     * Get ColorProduct of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colorProducts()
    {
        return $this->hasMany('App\Models\ColorProduct', 'product_id', 'id');
    }

    /**
     * Get Image of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image', 'product_id', 'id');
    }

    /**
     * Get OrderDetail of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail', 'product_id', 'id');
    }

    /**
     * Get Category Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get OrderDetail of Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_details', 'product_id', 'order_id');
    }

    /**
     * Get Promotion of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promotions()
    {
        return $this->hasMany(Promotion::class, 'product_id', 'id');
    }
}
