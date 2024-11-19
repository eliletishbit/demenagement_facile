<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AuthController;

class ClientController extends Controller
{
    //
    public function clientdashboardview(){
        return view('pages.back.clientdashboard');
    }
    
    public function verifyusereligibility(Request $request){

        
          $request->validate([
            'position' => 'required|string|max:255',
        ]);

        $locationsarea = [
            '1'=>'vedoko',
            '2'=>'sainte rita',
            '2'=>'ste rita',
            '4'=>'gbedjromede',
            '5'=>'kouhounou',
            '6'=>'setovi',

        ];
       
        foreach($locationsarea as $key => $value){
            if($value == $request->position){
                return redirect()->back()->withErrors(['success'=> 'Felicitations! Vous êtes eligible. Nous couvrons votre secteur de démenagement']);
            }

            return redirect()->back()->withErrors(['error' => "Désolé! Nous ne couvrons pas pour le moment votre secteur de déménagement. "]);
        }

        

    }
    
}
