<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutStore extends Model
{
    protected $table = 'about_store';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'phonenuber', 'description', 'address', 'avatar',
    ];

    /**
     * Get Product of User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(App\Models\Product, 'about_store_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
