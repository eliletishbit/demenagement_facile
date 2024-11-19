<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chauffeur extends Authenticatable
{
    use HasFactory;

    public function vehicules(){
        return $this->hasMany(Vehicule::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }


    protected $fillable = [
        
        'user_id',
        
    ];
}
