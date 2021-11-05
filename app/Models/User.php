<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    // type user
    const ADMIN = 1;
    const PARTNER = 2;

    // status
    const INACTIVE = 0;
    const ACTIVE = 1;
    const PENDING = 2;

    // role
    const ROLE_ADMIN = 'admin';
    const ROLE_PARTNER = 'partner';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = "users";

    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'mobile',
        'birthday',
        'cmtnd',
        'referral_code',
        'status',
        'otp',
        'promo_code',
        'parent_ids',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'string|max:255',
        'mobile' => 'required|string|max:255',
        'birthday' => 'required',
        'cmtnd' => 'required|string|max:12',
        'referral_code' => 'required|string|max:6',
        'parent_ids' => 'nullable|string',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
