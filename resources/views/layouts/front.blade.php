<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Main CSS File -->
  <link href="{{asset('css/main.css')}}" rel="stylesheet">

  <!-- styles importés de back dashback -->
  
 
 
  
  

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
  
      <a href="{{route('accueil')}}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->        
        <h1 class="sitename">{{$siteName}}</h1>
      </a>
  
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('accueil')}}" class="active">Accueil<br></a></li>
          <li><a href="{{route('about')}}">A propos</a></li>
          <li><a href="{{route('services')}}">Services</a></li>
          <li><a href="{{route('devis')}}">Devis</a></li>          
          <li class="dropdown"><a href="#"><span>Services connexes</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Emménagement</a></li>              
              <li><a href="#">Entretien nettoyage</a></li>
              <li><a href="#">Electricité</a></li>
              <li><a href="#">Plomberie</a></li>
              <li><a href="#">Jardinage</a></li>
              <li><a href="#">Cuisine</a></li>
              <li><a href="#">ravitaillement</a></li>              
            </ul>
          </li>
          <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @auth      
        <a class="dropdown-item btn-getstarted " href="{{ route('logout') }}" 
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="ti-power-off text-primary"></i> Déconnexion
        </a>
        <a href="{{route('notificationsview')}}" class="dropdown-item btn-getstarted bg-danger" href="">Notifications</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      @endauth
      @guest
        <a class="btn-getstarted" href="{{route('signupview')}}">Je veux demenager</a>
        <a class="btn-getstarted bg-danger" href="{{route('login')}}">Me connecter</a>        
      @endguest      
    </div>
  </header>

  

  <!--les heritages de template du model front-->


@yield('contenu_accueil')
@yield('contenu_about')
@yield('contenu_devis')
@yield('contenu_services')
@yield('contenu_contact')
@yield('contenu_signup')
@yield('contenu_login')
@yield('contenu_privacy')
@yield('contenu_cgu')
@yield('contenu_index_dash_chauffeur')
@yield('contenu_loginadmin')
@yield('contenu_signupadmin')

  








  <!--le pied de page---------------------------------------------------------------------->

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">{{$siteName}}</span>
          </a>
          <p>{{$siteDescription}}</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href="https://web.facebook.com/profile.php?id=100064942623739"><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Liens utiles</h4>
          <ul>
            <li><a href="{{route('accueil')}}">Accueil</a></li>
            <li><a href="{{route('about')}}">A propos</a></li>
            <li><a href="{{route('services')}}">Services</a></li>
            <li><a href="{{route('cgu')}}">Condition génarele d'utilisation</a></li>
            <li><a href="{{route('privacy')}}">Politique de confidentialité</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Nos Services</h4>
          <ul>
            <li><a href="#">Démenagement</a></li>
            <li><a href="#">Entretien</a></li>
            <li><a href="#">Emménagement</a></li>
            <li><a href="#">Entretien</a></li>
            <li><a href="#">Jardinage</a></li>
            <li><a href="#">Electricité</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contactez-Nous</h4>
          <p>voie pavé allant vers fidjrossè</p>
          <p>Akogbato, Godome</p>
          <p>Cotonou, Bénin</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+229 53 29 52 62</span></p>
          <p><strong>Email:</strong> <span>itlgcagency@gmail.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Demenagement facile</strong> <span>Tous droits réservés</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Developpé par <a href="">ITLGC</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>
  


  <!-- style importe de back dashback-->
 

</body>

</html>