<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankUsers extends Model
{
    public $table = "bank_users";

    protected $hidden = [
    
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function Withdraw()
    // {
    //     return $this->hasMany(Withdraw::class, 'id');
    // }

}