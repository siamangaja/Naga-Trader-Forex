<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    public $table = "transactions";

    protected $hidden = [
    
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}