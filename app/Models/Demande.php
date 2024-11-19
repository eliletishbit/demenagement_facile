<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Demande extends Model
{
    use HasFactory;

    public function paiement(){
        return $this->hasOne(Paiement::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }



    protected $fillable=[
        'client_id',
        'vehicule_id',
        'dateheuresouhaite',
        'pointdepart',
        'pointarrive',
        'statut',
        'montant',
        'datedemande',
    ];
}



