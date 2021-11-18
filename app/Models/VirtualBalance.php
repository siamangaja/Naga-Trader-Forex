<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualBalance extends Model
{
    public $table = "virtual_balance";

    protected $hidden = [
    
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}