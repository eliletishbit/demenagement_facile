<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    protected $fillable = [
        
        'user_id',
        
    ];
}
