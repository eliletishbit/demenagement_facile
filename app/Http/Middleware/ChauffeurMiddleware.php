<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use illuminate\Support\Facades\Auth;

class ChauffeurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
      // Vérifier si l'utilisateur est authentifié et s'il est un admin
      if (Auth::check() && Auth::user()->type_user_id == 2) { 
        return $next($request);
        }

        // Rediriger si l'utilisateur n'est pas un admin
        return redirect()->route('accueil')->with('error', "Accès refusé. Vous n'avez pas les autorisations nécessaires.");


    }
}
