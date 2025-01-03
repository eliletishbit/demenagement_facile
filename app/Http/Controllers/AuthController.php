<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Notifications\usserRegisteredNotification;




use App\Models\Client;
use App\Models\User;
use App\Models\Admin;
use App\Models\Chauffeur;
use App\Models\ServiceConnexe;
use App\Models\TypeUser;





class AuthController extends Controller
{
    public function login(){
        return view('pages.front.login');
    }


    //la logique d'authentification

    public function signin(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'telnumber'=>['required'],            
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirection en fonction du type d'utilisateur
            switch (Auth::user()->type_user_id) {
                case 1:
                    return redirect()->intended('client/dashboard'); // Redirection vers le tableau de bord client
                case 2:
                    return redirect()->intended('chauffeur/dashboard'); // Redirection vers le tableau de bord chauffeur
                case 3:
                    return redirect()->intended('admin/dashboard'); // Redirection vers le tableau de bord admin
                default:
                    return redirect()->route('accueil')->with('error', "Type d'utilisateur non reconnu.");
            }
        }
    
        return back()->with([
            'error' => 'Identifiant ou mot de passe incorrect.',
        ]);
    }

               

    
    //logique d'inscription
    public function signupview(){

        // Récupérer les types d'utilisateurs (clients et chauffeurs)
        $types = TypeUser::whereIn('id', [1, 2])->get();

        return view('pages.front.signup', compact('types') );
    }

    // enregitrer le user
public function register(Request $request)
{
    
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'telnumber' => 'required|string|max:15',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'type_user_id' => 'required|exists:type_users,id', // Validation pour s'assurer que l'ID existe dans type_users
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'telnumber' => $request->telnumber,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'type_user_id' => $request->type_user_id, // Utilisation du bon champ ici
    ]);

    //recup des services connexes
    $serviceConnexes = ServiceConnexe::all();

    //notifier l'utilisateur
    //$user->notify(new usserRegisteredNotification($user, $serviceConnexes ));
   
    // Enregistrement spécifique selon le type d'utilisateur (comme précédemment)
    switch ($request->type_user_id) {
        case 1: // Supposons que 1 soit l'ID pour client
            Client::create(['user_id' => $user->id]);
            // Authentification de l'utilisateur après la création
            Auth::login($user);
             // Redirection après l'inscription réussie
            return redirect()->route('login')->with('success', 'Inscription réussie !');
            break;
        case 2: // Supposons que 2 soit l'ID pour chauffeur
            Chauffeur::create(['user_id' => $user->id]);
            // Authentification de l'utilisateur après la création
            Auth::login($user);
             // Redirection après l'inscription réussie
            return redirect()->route('login')->with('success', 'Inscription réussie !');
            break;
        case 3: // Supposons que 3 soit l'ID pour admin
            Admin::create(['user_id' => $user->id]);
            // Authentification de l'utilisateur après la création
            Auth::login($user);
             // Redirection après l'inscription réussie
            return redirect()->route('loginadminview')->with('success', 'Inscription réussie !');
            break;
        default:
            return redirect()->back()->withErrors(['error' => "Echec de l'inscription.vueillez reessayer"]);
    }

      

     
}


public function logout(Request $request){

    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('accueil');

}






// 
}
