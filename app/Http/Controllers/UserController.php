<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Client;
use App\Models\Admin;
use App\Models\Chauffeur;
use App\Models\TypeUser;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{

    // Méthode pour afficher tous les utilisateurs
    public function allusers()
    {
 
        $users = User::All(); // Récupérer tous les utilisateurs
        $types = TypeUser::All();

        return view('pages.back.gestionadmins', compact('users', 'types')); // Passer les utilisateurs à la vue
    }

    // Méthode pour afficher tous les utilisateurs type 3
    public function allusersadmins()
    {
        
        $users = User::Where('type_user_id', '3')->get(); // Récupérer tous les utilisateurs
        $types = TypeUser::All();

        return view('pages.back.gestionadmins', compact('users', 'types')); // Passer les utilisateurs à la vue
    }
    // Méthode pour afficher tous les utilisateurs type 2
    public function alluserschauffeurs()
    {
        
        $users = User::Where('type_user_id', '2')->get(); // Récupérer tous les utilisateurs
        $types = TypeUser::All();

        return view('pages.back.gestionchauffeurs', compact('users', 'types')); // Passer les utilisateurs à la vue
    }
    
    // Méthode pour afficher tous les utilisateurs type 1
    public function allusersclients()
    {
       
        $users = User::Where('type_user_id', '1')->get(); // Récupérer tous les utilisateurs
        $types = TypeUser::All();

        return view('pages.back.gestionclients', compact('users', 'types')); // Passer les utilisateurs à la vue
    }

    // Méthode pour mettre à jour un utilisateur
    public function userupdate(Request $request, $id)
    { 
        $user = User::findOrFail($id); // Trouver l'utilisateur par ID
        $user->update($request->all()); // Mettre à jour l'utilisateur avec les données du formulaire

       
        return redirect()->route('gestionclients');
    }

    // Méthode pour supprimer un utilisateur
    public function userdestroy($id)
{
    // Trouver l'utilisateur par ID
    $user = User::findOrFail($id); 

    // Supprimer les données dans les tables associées
    $message = '';
    $errorMessage = '';

    switch ($user->type_user_id) {
        case 1: // Client
            $client = Client::where('user_id', $user->id)->first();
            if ($client) {
                $client->delete();
                $message = 'Client supprimé avec succès.';
            } else {
                $errorMessage = 'Impossible de supprimer le client. Correspondance introuvable.';
            }
            break;

        case 2: // Chauffeur
            $chauffeur = Chauffeur::where('user_id', $user->id)->first();
            if ($chauffeur) {
                $chauffeur->delete();
                $message = 'Chauffeur supprimé avec succès.';
            } else {
                $errorMessage = 'Impossible de supprimer le chauffeur. Correspondance introuvable.';
            }
            break;

        case 3: // Admin
            $admin = Admin::where('user_id', $user->id)->first();
            if ($admin) {
                $admin->delete();
                $message = 'Admin supprimé avec succès.';
            } else {
                $errorMessage = 'Impossible de supprimer cet admin. Correspondance introuvable.';
            }
            break;
    }

    // Supprimer l'utilisateur après avoir supprimé les enregistrements associés
    $user->delete(); 

    // Rediriger avec le message approprié
    if ($message) {
        return redirect()->route('gestionclients')->with('success', $message);
    } else {
        return redirect()->route('gestionclients')->with('error', $errorMessage);
    }
}
   





}
