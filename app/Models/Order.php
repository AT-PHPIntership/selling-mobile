<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity', 'date_checkout', 'status',  'user_id', 'total_price'
    ];

    /**
     * Get OrderDestail of Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetails()
    {
        return $this->hasMany(App\Models\OrderDestail, 'order_id', 'id');
    }

    /**
     * Get User Object
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(App\Models\User, 'user_id', 'id');
    }
}
