@extends('layouts.front')

@section('contenu_loginadmin')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{asset('img/page-title-bg.jpg')}});">
    <div class="container position-relative">
      <h1>Connectez-vous</h1>
      <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('accueil')}}">Accueil</a></li>
          <li class="current">Connectez-vous</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Get A Quote Section -->
  <section id="get-a-quote" class="get-a-quote section">

    <div class="container">

      @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
      @endif

      @if(session()->has('error'))
            <div class="alert alert-success">
                {{session()->get('error')}}
            </div>
      @elseif(session()->has('success'))
            <div class="alert alert-info">
                {{session()->get('success')}}
            </div>
      @endif

      <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

        <div class="container mt-2">
          <h2 class="text-center">Connexion</h2>
          <form action="{{ route('loginadmin') }}" method="POST" class="mt-4">
              @csrf
              <div class="mb-3">
                  <label for="telnumber" class="form-label">Identifiant (Username / Numéro Client / Numéro Chauffeur)</label>
                  <input type="text" id="telnumber" name="telnumber" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Mot de passe</label>
                  <input type="password" id="password" name="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Se connecter</button>
          </form>
          <div class="text-center mt-3">
              <a href="#">Mot de passe oublié ?</a>
          </div>
        </div>
        
      </div>

    </div>

  </section><!-- /Get A Quote Section -->

</main>





@endsection('contenu_login')

  