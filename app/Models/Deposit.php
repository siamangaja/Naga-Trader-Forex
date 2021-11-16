<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    public $table = "deposit";

    protected $hidden = [
    
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}