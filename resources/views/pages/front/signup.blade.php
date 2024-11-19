@extends('layouts.front')

@section('contenu_signup')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('img/page-title-bg.jpg') }});">
    <div class="container position-relative">
      <h1>Inscrivez-vous</h1>
      <p>Remplissez le formulaire ci-dessous pour créer votre compte.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('accueil') }}">Accueil</a></li>
          <li class="current">Inscrivez-vous</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Inscription Section -->
  <section id="signup" class="signup section">

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Inscription</h4>
                </div>
                <div class="card-body">

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

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nom :</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="ex: rodrigue AZERTY">
                        </div>
                        <div class="form-group mb-3">
                            <label for="telnumber">Numéro de téléphone :</label>
                            <input type="text" class="form-control" id="telnumber" name="telnumber" required placeholder="ex:98737373">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="ex: email@gmail.com ">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="au moins 8 caractères ">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirmer le mot de passe :</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="form-group mb-3">
                          <label for="type_user_id">Type d'utilisateur :</label>
                          <select class="form-control" id="type_user_id" name="type_user_id" required>
                              <option value="" disabled selected>Choisissez un type</option>
                              @foreach($types as $type)
                                  <option value="{{ $type->id }}">{{ $type->libtype }}</option> 
                              @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    

  </section><!-- /Signup Section -->

</main>

@endsection('signup')

