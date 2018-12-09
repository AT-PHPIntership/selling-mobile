<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING_STATUS = 'Pending';
    const APPROVE_STATUS = 'Approve';
    const CANCEL_STATUS = 'Cancel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'date_checkout', 'status', 'user_id', 'total_price', 'note'
    ];

    /**
     * Get OrderDestail of Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Get User Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get OrderDetail of Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id');
    }

    /**
     * Get the order's status
     *
     * @return string
     */
    public function getCurrentStatusAttribute()
    {
        switch ($this->status) {
            case config('setting.order.status.pending'):
                return self::PENDING_STATUS;
            case config('setting.order.status.approve'):
                return self::APPROVE_STATUS;
            case config('setting.order.status.cancel'):
                return self::CANCEL_STATUS;
            default:
        }
    }
}
