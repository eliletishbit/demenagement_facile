@extends('layouts.front')

@section('contenu_devis')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{asset('img/page-title-bg.jpg')}});">
    <div class="container position-relative">
      <h1>Demandez un devis pour votre démenagement</h1>
      <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('accueil')}}">Accueil</a></li>
          <li class="current">Devis </li>
        </ol>
      </nav>
    </div>
    
  </div><!-- End Page Title -->

  <div class="container mt-4 mb-4 py-4  text-center">
    <a class="btn  btn-danger" href="{{route('signupview')}}">Inscrivez-vous pour continuer</a>
  </div>
  
  

</main>
@section('contenu_devis')



 

  