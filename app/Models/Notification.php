<?php

namespace App\Models;
use App\Models\Client;
use App\Models\Admin;
use App\Models\Chauffeur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function chauffeur(){
        return $this->belongsTo(Chauffeur::class);
    }

    use HasFactory;
}
