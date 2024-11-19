<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    public function demandes(){
        return $this->hasMany(Demande::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    protected $fillable = [
        
        'user_id',
        
    ];
   
}
