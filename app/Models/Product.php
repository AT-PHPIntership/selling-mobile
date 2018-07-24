<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quantity', 'manufacturing_date', 'status', 'producer', 'detail', 'description', 'category_id','discount_id', 'about_store_id'
    ];

    /**
     * Get Reviews of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(App\Models\Review, 'product_id', 'id');
    }
    
    /**
     * Get ColorProduct of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colorProducts()
    {
        return $this->hasMany(App\Models\ColorProduct, 'product_id', 'id');
    }

    /**
     * Get OrderDetail of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetail()
    {
        return $this->hasMany(App\Models\OrderDetail, 'product_id', 'id');
    }

    /**
     * Get Discount Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discounts()
    {
        return $this->belongsTo(App\Models\Discount, 'discount_id', 'id');
    }

    /**
     * Get Category Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(App\Models\Category, 'category_id', 'id');
    }

    /**
     * Get AboutStore Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aboutStores()
    {
        return $this->belongsTo(App\Models\AboutStore, 'about_store_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
