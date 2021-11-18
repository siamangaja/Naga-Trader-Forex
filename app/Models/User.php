<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];

    // public function BlogDetails()
    // {
    //     return $this->hasMany(BlogDetails::class, 'id');
    // }

    // public function Deposit()
    // {
    //     return $this->hasMany(Deposit::class, 'id');
    // }

    // public function Withdraw()
    // {
    //     return $this->hasMany(Withdraw::class, 'id');
    // }

    // public function BankUsers()
    // {
    //     return $this->hasMany(BankUsers::class, 'id');
    // }

    // public function Order()
    // {
    //     return $this->hasMany(Order::class, 'id');
    // }

    public function Wallet()
    {
        return $this->hasMany(Wallet::class, 'id');
    }

    public function VirtualBalance()
    {
        return $this->hasMany(VirtualBalance::class, 'id');
    }

    public function Transactions()
    {
        return $this->hasMany(Transactions::class, 'id');
    }

}