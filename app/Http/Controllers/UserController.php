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
        $user = User::findOrFail($id); // Trouver l'utilisateur par ID
        $user->delete(); // Supprimer l'utilisateur

        return redirect()->route('gestionclients')->with('success', 'Utilisateur supprimé avec succès.');
    }

 
   





}
