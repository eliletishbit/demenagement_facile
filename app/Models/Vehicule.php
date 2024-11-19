<?php

namespace App\Models;
use App\Models\Demande;
use App\Models\TypeVehicule;
use App\Models\Chauffeur;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{

    public function chauffeur(){
        return $this->belongsTo(Chauffeur::class);
    }

    public function type_vehicule(){
        return $this->belongsTo(TypeVehicule::class);
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }



    protected $fillable=[
        'type_vehicule_id',
        'chauffeur_id',
        'libvehicule',
        'immatr',
        'imagevehicule',
        'prixparkilometre',
        'statut',
    ];
    use HasFactory;
}
