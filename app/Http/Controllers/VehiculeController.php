<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




use App\Models\User;
use App\Models\Client;
use App\Models\Admin;
use App\Models\Chauffeur;
use App\Models\TypeUser;
use App\Models\Vehicule;
use App\Models\TypeVehicule;

class VehiculeController extends Controller
{
    //

    //fnction d'affichage du formulaire ajout vehicule
    public function createvehiculeview(){

        $typesv = TypeVehicule::All();
        $user = Auth::user();
        $chauffeur = Chauffeur::where('user_id', $user->id)->first();

        
        // return view('pages.back.gestionvehicules', compact('typesv'));
        return view('pages.back.gestionvehicules', compact('typesv','chauffeur'));
    }

    public function createvehicule(Request $request){
        
         // Validation des données
            $request->validate([
                'type_vehicule_id' => 'required',
                'chauffeur_id' => 'required',
                'libvehicule' => 'required|string',
                'immatr' => 'required|string',
                'imagevehicule'=>'image|max:2000',
                'prixparkilometre'=>'required',
                'statut'=>'required',
                
            ]);

            
            //on recup nom image
            $image = $request->file('imagevehicule');
            //on recup chemin image 
            $imagepath = $image->store('photosvehicules', 'public');
            //on stocke le chemin dans $data
            // $data['imagevehicule']=$imagepath;


        
            $vehicule = Vehicule::create([
                'type_vehicule_id'=>$request->type_vehicule_id,
                'chauffeur_id'=>$request->chauffeur_id,
                'libvehicule'=>$request->libvehicule,
                'immatr'=>$request->immatr,
                'imagevehicule'=>$imagepath,
                'prixparkilometre'=>$request->prixparkilometre,
                'statut'=>$request->statut,
                ]);
                
              
                return redirect()->route('gestionvehiculesview')->with('success', 'vehicule ajoutee !');
               
            
        
    }

    public function listevehicules(){
        $vehicules = Vehicule::All();
        return view('pages.back.listevehicules', compact('vehicules'));
    }

    // Méthode pour supprimer un vehicule
    public function vehiculedestroy($id)
    {
        $vehicules = Vehicule::findOrFail($id); // Trouver l'utilisateur par ID
        $vehicules->delete(); // Supprimer l'utilisateur

        return redirect()->route('gestionvehicules')->with('success', 'vehicule supprimé avec succès.');
    }


}
