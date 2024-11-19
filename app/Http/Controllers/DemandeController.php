<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;




use App\Models\Demande;
use App\Models\Vehicule;
use App\Models\Client;
use App\Models\Chauffeur;


use Illuminate\Http\Request;

class DemandeController extends Controller
{

    public function gestiondemandesview(){

        $demandes = Demande::All();
        return view('pages.back.gestiondemandes', compact('demandes'));
    }

    public function creerdemandeview(){
        //recup id vehicule et l'id client liés a une demande grace a la relation demande
        $vehicules = Vehicule::All();

        //recup  du client lorsque le user_id est egale a celui de auth::user
        $user = Auth::user();
        $client = Client::where('user_id', $user->id)->first();      



        return view('pages.back.creerdemande', compact('vehicules','client'));
    }

           

         public function creerdemande(Request $request){
            // Validation des données
           $validated = $request->validate([
                'pointdepart' => 'required|string|max:255',
                'pointarrive' => 'required|string|max:255',
                'vehicule_id' => 'required',
                'client_id' => 'required',
                'dateheuresouhaite' => 'required|',
                'statut' => 'required',
                'montant' => 'numeric',
                'datedemande' => 'required' 
                
            ]);

             //gerer le calcule de la distance et du montant
            $api_key = '2sAWIWxRpdCyTUnanboUzJndaRgEhJyY2LikxSBiAbZHjn9gSJC08gIDT3DLKBsf';
            $origine = $request->input('pointdepart');
            $destination = $request->input('pointarrive');

            

            $url = "https://api.distancematrix.ai/maps/api/distancematrix/json?origins=$origine&destinations=$destination&key=$api_key";
            $jsonresponse = file_get_contents($url);           
            if($jsonresponse){
                $data = json_decode($jsonresponse);
                if($data){       
                    $distance_en_m = $data->rows[0]->elements[0]->distance->value; // Distance en mètres
                    $distance_en_km = $distance_en_m / 1000; // Convertir en kilomètres
    
                    // Récupérer le prix par kilomètre lorsque l'id du véhicule est égal à vehicule_id
                    $vehicule = Vehicule::where('vehicule_id', $request->vehicule_id)->first();
                    if ($vehicule) {
                        $priparkm = $vehicule->prixparkilometre;
                        $montant = $distance_en_km * $priparkm;
    
                        // Création d'une demande
                        Demande::create([
                            'pointdepart' => $request->pointdepart,
                            'pointarrive' => $request->pointarrive,
                            'vehicule_id' => $request->vehicule_id,
                            'client_id' => $request->client_id,
                            'dateheuresouhaite' => $request->dateheuresouhaite,
                            'statut' => $request->statut,
                            'montant' => $montant, // Utilisez le montant calculé ici
                            'datedemande' => $request->datedemande,
                        ]);
    
                        return redirect()->route('creerdemandeview')->with(
                            'success', "Demande créée avec succès. Le montant total à payer en fonction de votre distance est : " . number_format($montant, 2)
                        );
                    }
                    return "Erreur véhicule.";
                    
                }return "erreur inconnue. vueillez reessayer";
            } return "erreur serveur. vueillez reessayer";

            

            

         }



         
   


     // Méthode pour mettre à jour une demande
     public function demandeupdate(Request $request, $id)
     { 
         $demande = Demande::findOrFail($id); // Trouver la demande par ID
         $demande->update($request->all()); // Mettre à jour la demande
 
        
         return redirect()->route('gestiondemandesview');
     }
 
     // Méthode pour supprimer une demande 
     public function demandedestroy($id)
     {
         $demande = Demande::findOrFail($id); // Trouver la demande par ID
         $demande->delete(); // Supprimer la demande
 
         return redirect()->route('gestiondemandesview')->with('success', 'Utilisateur supprimé avec succès.');
     }

     
    
   


}
