<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;

class ChauffeurController extends Controller
{
    //

    public function chauffeurdashboardview(){
        return view('pages.back.chauffeurdashboard');
    }

    public function gainschauffeurview(){
        return view('pages.back.gains');
    }

    
}
