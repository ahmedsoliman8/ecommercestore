<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mindscms\Entrust\Traits\EntrustUserWithPermissionsTrait;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;



class User extends Authenticatable implements  MustVerifyEmail
{
    use HasFactory, Notifiable,SearchableTrait,EntrustUserWithPermissionsTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'mobile',
        'user_image',
        'status',
        'email',
        'password',
    ];

    protected  $appends=['full_name'];


    public function receivesBroadcastNotificationsOn(): string
    {
        return 'App.Models.User.' . $this->id;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $searchable = [
        'columns' => [
            'users.first_name' => 10,
            'users.last_name' => 10,
            'users.username' => 10,
            'users.email' => 10,
            'users.mobile' => 10,
        ]
    ];


    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function  getFullNameAttribute(){
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }


    public  function reviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
