<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public $table = "wallet";

    protected $hidden = [
    
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}