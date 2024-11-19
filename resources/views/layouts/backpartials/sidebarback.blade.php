<nav class="sidebar sidebar-offcanvas  " id="sidebar">
  <ul class="nav">
      <li class="nav-item">
          <a class="nav-link" href="">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">pages utilisateur </span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                  @if(Auth::user()->type_user_id == 3) <!-- Admin -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('gestionutilisateurs') }}">Utilisateurs</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('gestionclients') }}">Clients</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('gestionchauffeurs') }}">Chauffeurs</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('gestionadmins') }}">Admins</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('gestiondemandesview') }}">Demandes</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('listevehicules') }}">Vehicules</a></li>                      
                      <li class="nav-item"><a class="nav-link" href="{{ route('notificationsview') }}">Notifications</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('servicesconnexesview') }}">Services Connexes</a></li>
                  @elseif(Auth::user()->type_user_id == 2) <!-- Chauffeur -->                      
                      <li class="nav-item"><a class="nav-link" href="{{ route('gestionvehiculesview') }}">Véhicules</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('gainschauffeurview') }}">Gains</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('notifications') }}">Notifications</a></li>
                  @elseif(Auth::user()->type_user_id == 1) <!-- Client -->
                      <li class="nav-item"><a class="nav-link" href="{{ route('creerdemandeview') }}">Créer Demande</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('suividemandeview') }}">Suivie Demande</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('telechargerdevisview') }}">Devis</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('notifications') }}">Notifications</a></li>
                  @endif
                  <!-- Connexion pour tous les utilisateurs non connectés -->
                  @if(!Auth::check())
                      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                  @endif
              </ul>
          </div>
      </li>

      <!-- Autres éléments du menu -->
      <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="#">Autres ressources</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">API</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Typography</a></li>
              </ul>
          </div>
      </li>     
  </ul>
</nav> 