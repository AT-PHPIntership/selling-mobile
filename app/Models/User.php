<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    const ADMIN_ROLE = 'Admin';
    const MEMBER_ROLE = 'Member';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'phonenumber', 'address', 'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'role', 'remember_token'
    ];

    /**
     * Get Orders of User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(App\Models\Order, 'user_id', 'id');
    }

    /**
     * Get Reviews of User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(App\Models\Review, 'user_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the user's role
     *
     * @return string
     */
    public function getCurrentRoleAttribute()
    {
        switch ($this->role) {
            case config('setting.role.admin'):
                return self::ADMIN_ROLE;
            case config('setting.role.member'):
                return self::MEMBER_ROLE;
            default:
        }
    }
}
