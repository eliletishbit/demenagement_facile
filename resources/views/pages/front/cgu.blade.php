@extends('layouts.front')

@section('contenu_cgu')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{asset('img/page-title-bg.jpg')}});">
    <div class="container position-relative">
      <h1>Conditions génerales d'utilisation</h1>
      <p>Consultez notre contion génarale d'utilisation pour être au courant de tout .</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('accueil')}}">Accueil</a></li>
          <li class="current">cgu</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <div class="container ml-4 m-4 py-4 text-center">
    
    <div class="row g-0" data-aos="fade-up" data-aos-delay="100">            
          <h1>Conditions Générales d'Utilisation (CGU)</h1>
          <p>
                        
            Bienvenue sur {{$siteName}}, votre partenaire de confiance pour tous vos besoins en déménagement. 
            En accédant à notre site et en utilisant nos services, vous acceptez de vous conformer aux présentes 
            Conditions Générales d'Utilisation. Si vous n'acceptez pas ces conditions, nous vous prions de ne pas
            utiliser notre site.
            <br><br>          
            deplacetoi est spécialisé dans le déménagement de biens de toutes tailles. Nous nous engageons à faciliter 
            votre déménagement en assurant le transport sécurisé de vos biens depuis votre ancienne destination jusqu'à
            votre nouvelle adresse. Notre équipe expérimentée veille à ce que chaque déménagement se déroule sans stress
            et sans accroc, conformément à notre slogan : "Déménager sans stress, c'est notre métier."
          <br><br>           
            En utilisant notre site, vous vous engagez à fournir des informations exactes et complètes lors de la création de votre compte ou de la demande de nos services. Vous êtes également responsable de la confidentialité de vos informations d'identification et de toutes les activités effectuées sous votre compte. Nous vous recommandons de nous informer immédiatement en cas d'utilisation non autorisée de votre compte.
          <br><br>            
            Tous les contenus présents sur le site deplacetoi, y compris mais sans s'y limiter, les textes, images, logos, et graphiques, sont protégés par des droits d'auteur et sont la propriété exclusive de deplacetoi ou de ses partenaires. Toute reproduction ou représentation totale ou partielle du site ou de son contenu est strictement interdite sans autorisation préalable.
          <br><br>           
            Nous nous réservons le droit de modifier ces Conditions Générales d'Utilisation à tout moment. Les modifications entreront en vigueur dès leur publication sur notre site. Il est donc conseillé de consulter régulièrement cette page pour rester informé des éventuels changements. Votre utilisation continue du site après la publication des modifications constitue votre acceptation des nouvelles conditions.
          </p>
    </div>
  
  
</main>


@endsection('contenu_cgu')