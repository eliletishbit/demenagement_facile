@extends('layouts.front')

@section('contenu_privacy')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{asset('img/page-title-bg.jpg')}});">
    <div class="container position-relative">
      <h1>Politique de confidentialité</h1>
      <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('accueil')}}">Accueil</a></li>
          <li class="current">Politique de confidentialité</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->


  <div class="container m-4 py-4 text-center">
    
    <div class="row g-0" data-aos="fade-up" data-aos-delay="100">            
          <h1>Notre politique de confidentialité</h1>
          <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi doloremque distinctio 
              accusantium totam, pariatur eveniet velit ipsam numquam fugiat officiis, aperiam vel 
              exercitationem, voluptatem necessitatibus magni saepe. Inventore nesciunt debitis ratione 
              molestiae, ad nostrum? Eaque ex praesentium beatae reprehenderit ea nostrum inventore vero, 
              culpa quas autem laudantium distinctio. Fugiat laudantium sapiente soluta, dicta sint minus
               magnam ducimus magni. Quod, aspernatur.
          </p>
    </div>
  

</main>


@endsection('contenu_privacy')

  