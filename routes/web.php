<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\GainController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ServiceConnexeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\ServiceConnexe;
use illuminate\Support\Facades\Auth;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*-----------------------------------------------les routes front -------------------------*/

//accueil
Route::get('/accueil', function () {
    return view('pages.front.index');
})->name('accueil');

Route::post('/accueil', [ClientController::class,'verifyusereligibility'] )->name('verifyusereligibility');

//a propos
Route::get('/about', function () {
    return view('pages.front.about');
})->name('about');

//services
Route::get('/services', function () {
    return view('pages.front.services');
})->name('services');

//devis
Route::get('/devis', function () {
    return view('pages.front.devis');
})->name('devis');

//contact
Route::get('/contact', function () {
    return view('pages.front.contact');
})->name('contact');

//cgu
Route::get('/cgu', function () {
    return view('pages.front.cgu');
})->name('cgu');

//confidentialité
Route::get('/privacy', function () {
    return view('pages.front.privacy');
})->name('privacy');


////////////////////////////////// ROUTES COMMUNS D'INSCRIPTION ET D AUTHETIFICATION
Route::get('/login', [AuthController::class,'login'] )->name('login');
Route::post('/signin', [AuthController::class,'signin'])->name('signin');
 
//inscription all users  - 3 
Route::get('/signup', [AuthController::class, 'signupview'])->name('signupview');
Route::post('/register', [AuthController::class, 'register'])->name('register');


//inscription et authetification admin
Route::get('/signupadmin', [AdminController::class, 'signupadminview'])->name('signuadminview');
Route::post('/registeradmin', [AdminController::class, 'registeradmin'])->name('registeradmin');


Route::get('/loginadminview', [AdminController::class, 'loginadminview'])->name('loginadminview');
Route::post('/loginadmin', [AdminController::class, 'loginadmin'])->name('loginadmin');



//deconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*-----------------------------------------------les routes back -------------------------*/

Route::prefix('admin')->middleware(['auth', 'admin'])->group( function(){

   
    // Route pour afficher la liste des utilisateurs
    Route::get('/gestionclients', [UserController::class, 'allusersclients'])->name('gestionclients');
    // Route pour mettre à jour un utilisateur
    Route::put('/users/{id}', [UserController::class, 'userupdate'])->name('userupdate');
    // Route pour supprimer un utilisateur
    Route::delete('/users/{id}', [UserController::class, 'userdestroy'])->name('userdestroy');

    Route::get('dashboard', [AdminController::class, 'admindashboardview'])->name('admindashboardview');
   
    // Route pour afficher la liste des utilisateurs chauffeur
    Route::get('/gestionchauffeurs', [UserController::class, 'alluserschauffeurs'])->name('gestionchauffeurs');

    // Route pour afficher la liste des utilisateurs admins
    Route::get('/gestionadmins', [UserController::class, 'allusersadmins'])->name('gestionadmins');

    // Route pour afficher la liste de tous utilisateurs 
    Route::get('/gestionutilisateurs', [UserController::class, 'allusers'])->name('gestionutilisateurs');

   

    //route pour lister vehicules
    Route::get('/listevehicules', [VehiculeController::class, 'listevehicules'])->name('listevehicules');
    //route suppression vehicule
    Route::delete('/vehicules/{id}', [UserController::class, 'vehiculesdestroy'])->name('vehiculesdestroy');


    Route::get('/gestiondemandesview', [DemandeController::class, 'gestiondemandesview'])->name('gestiondemandesview');
    // Route pour mettre à jour un demande
    Route::put('/demandes/{id}', [DemandeController::class, 'demandeupdate'])->name('demandeupdate');
    // Route pour supprimer un demande
    Route::delete('/demandes/{id}', [DemandeController::class, 'demandedestroy'])->name('demandedestroy');
    
    // Route pour notifications admin
    Route::get('/notificationsview', [NotificationController::class, 'notificationsview'])->name('notificationsview');
    // Route pour services connexes
    Route::get('/servicesconnexesview', [ServiceConnexeController::class, 'servicesconnexesview'])->name('servicesconnexesview');
    
      
   
    Route::get('dashboard/suivigains', function () {
        return view('pages.back.suivigains');
    })->name('suivigains');
    
    Route::get('dashboard/servicesconnexes', function () {
        return view('pages.back.servicesconnexes');
    })->name('servicesconnexes');

});


Route::prefix('client')->middleware(['auth', 'client'])->group( function(){

    Route::get('dashboard', [ClientController::class, 'clientdashboardview'])->name('clientdashboardview');
    Route::get('creerdemandeview', [DemandeController::class, 'creerdemandeview'])->name('creerdemandeview');
    Route::get('suividemande', [DemandeController::class, 'suividemandeview'])->name('suividemandeview');
    Route::get('telechargerdevis', [ClientController::class, 'telechargerdevisview'])->name('telechargerdevisview');
    //route get de creatrion demande
    Route::post('creerdemande', [DemandeController::class, 'creerdemande'])->name('creerdemande');
    


});


Route::prefix('chauffeur')->middleware(['auth', 'chauffeur'])->group( function(){

    Route::get('dashboard', [ChauffeurController::class, 'chauffeurdashboardview'])->name('chauffeurdashboardview');
    Route::get('gainschauffeur', [ChauffeurController::class, 'gainschauffeurview'])->name('gainschauffeurview');

     //route pour afficher la vue du formulaire d'ajout vehicule
    Route::get('/gestionvehiculesview', [VehiculeController::class, 'createvehiculeview'])->name('gestionvehiculesview');
    //route en post pour traiter la soumission de vehicules
    Route::post('/gestionvehicules', [VehiculeController::class, 'createvehicule'])->name('addvehicules');

});





