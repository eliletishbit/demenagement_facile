<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceConnexe;

class ServiceConnexeController extends Controller
{
    //
    public function servicesconnexesview(){

        $serviceconnexes = ServiceConnexe::All();


        return view('pages.back.servicesconnexes', compact('serviceconnexes'));
    }

    
}
