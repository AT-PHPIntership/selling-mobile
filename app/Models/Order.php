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
        'id', 'quantity', 'date_checkout', 'status', 'user_id', 'total_price'
    ];

    /**
     * Get OrderDestail of Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetails()
    {
        return $this->hasMany(OrderDestail::class, 'order_id', 'id');
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
