<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;



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

    public function creerdemandeview(Request $request){
        //recup id vehicule et l'id client liés a une demande grace a la relation demande
        $vehicules = Vehicule::inRandomOrder()->get();

        //recup  du client lorsque le user_id est egale a celui de auth::user
        $user = Auth::user();
        $client = Client::where('user_id', $user->id)->first();  
        
       

        

        return view('pages.back.creerdemande', compact('vehicules','client'));
    }


    public function autocomplete(Request $request){
        $query = $request->input('query');
        $apiKey = 'db581917a67e483fa2ec9eb61340cab7'; // Remplacez par votre clé API
        $country = 'Benin';
        $response = Http::get("https://api.geoapify.com/v1/geocode/autocomplete", [
            'text' => $query,
            // 'type'=>'city',
            // 'country'=>$country,
            'filter'=>'bj',
            'city'=>'cotonou',
            'format' => 'json',
            'limit' => 5,
            'apiKey' => $apiKey,
        ]);

        
        return response()->json($response->json());
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
                    // dd($distance_en_km);
                    // Récupérer le prix par kilomètre 
                    $vehicule = Vehicule::where('id', $request->vehicule_id)->first();
                    
                    if ($vehicule) {
                        $prixparkm = $vehicule->prixparkilometre;
                        $montant = $distance_en_km * $prixparkm;
                     //dd($distance_en_km);
                    //dd($montant);
    

                       //reinjecter les données dans la vue
                        return view('pages.back.recapedemande', [
                            'pointdepart' => $request->input('pointdepart'),
                            'pointarrive' => $request->input('pointarrive'),
                            'distance' => $distance_en_km,
                            'montant' => $montant,
                            'vehicule_id' => $request->input('vehicule_id'),
                            'client_id' => $request->input('client_id'),
                            'dateheuresouhaite'=>$request->input('dateheuresouhaite'),
                            'statut'=>$request->input('statut'),
                            'datedemande'=>$request->input('datedemande')
                        ]);
                        

    
                       
                    }
                     return back()->withErrors(['error' => 'Une vehicule. vueillez reessayer']);
                    
                } return back()->withErrors(['error' => 'erreur serveur.vueillez ressayer']);
            }  return back()->withErrors(['error' => 'reponse inconnue. erreur serveur distant.']);

                 

        }

        
        public function cancelDemande() {           
            return redirect()->route('creerdemandeview')->with('info', 'Demande annulée.');
        }

        public function approveDemande(Request $request) {
            // Valider les données du formulaire si nécessaire
            $validated = $request->validate([
                'pointdepart' => 'required|string|max:255',
                'pointarrive' => 'required|string|max:255',
                'distance' => 'required|numeric',
                'montant' => 'required|numeric',
                'vehicule_id' => 'required|exists:vehicules,id', // Vérifie que l'ID du véhicule existe
                'client_id' => 'required|exists:clients,id', // Vérifie que l'ID du client existe
                'statut'=>'required',
                'datedemande'=>'required',
                'dateheuresouhaite'=>'required'
            ]);
        
            // Création d'une demande
            Demande::create([
                'pointdepart' => $validated['pointdepart'],
                'pointarrive' => $validated['pointarrive'],
                'vehicule_id' => $validated['vehicule_id'],
                'client_id' => $validated['client_id'],
                'dateheuresouhaite' => $validated['dateheuresouhaite'], // Ou utilisez la valeur reçue si nécessaire
                'statut' =>$validated['statut'],
                'montant' => $validated['montant'], // Utilisez le montant transmis ici
                'datedemande' => $validated['datedemande'], // Ou utilisez la date fournie par l'utilisateur
            ]);
        
            // Rediriger vers la page de création de demande ou une autre page
            return redirect()->route('suiviedemandeview')->with('success', 'Demande approuvée avec succès.');
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

     
    
     public function suividemandeview() {
        // Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirigez vers la page de connexion si l'utilisateur n'est pas authentifié
        }
    
        // Récupérer l'utilisateur authentifié
        $user = auth()->user();
    
        // Trouver le client correspondant à cet utilisateur
        $client = Client::where('user_id', $user->id)->first(); 
    
        if (!$client) {
            // Si aucun client n'est trouvé pour cet utilisateur, rediriger ou afficher un message
            return redirect()->route('some.route')->with('error', 'Aucun client associé à cet utilisateur.');
        }
    
        // Récupérer uniquement les 5 dernières demandes correspondant à ce client
        $demande = Demande::where('client_id', $client->id)->first();
                            // ->latest() // Trie par la colonne created_at par défaut
                            // ->take(1)   // Limite à 5 résultats
                            // ->get();
    
        return view('pages.back.suiviedemande', compact('demande'));
    }

}
