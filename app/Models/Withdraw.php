<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    public $table = "withdraw";

    protected $hidden = [
    
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}