<?php

namespace App\Models;

use App\Models\Demande;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    public function demande(){
        return $this->hasOne(Demande::class);
    }

}
