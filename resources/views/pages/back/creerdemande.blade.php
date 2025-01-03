@extends('layouts.dashback')

@section('contenu_creerdemande')


<!-- partial -->
<div class="container w65 mt-4 mb-4">
    <h1>DEMANDER UN DEMENAGEMENT</h1>
    <!-- Affichage des erreurs -->
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
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @elseif(session()->has('success'))
        <div class="alert alert-info">
            {{session()->get('success')}}
        </div>
    @endif

 

    <form id="demandeform" action="{{ route('creerdemande') }}" method="POST">
        @csrf
        
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="pointdepart">Adresse de départ :</label>
                <input type="text" class="form-control" id="pointdepart" name="pointdepart" required placeholder="ex: vedoko carrefour zezoume ">
                <div class="suggestions-container" id="suggestions-depart"></div> <!-- Conteneur pour les suggestions -->
            </div>

            <div class="form-group mb-3">
                <label for="pointarrive">Adresse de destination :</label>
                <input type="text" class="form-control" id="pointarrive" name="pointarrive" required placeholder="ex: godome pharmacie fignonhou ">
                <div class="suggestions-container" id="suggestions-arrive"></div> <!-- Conteneur pour les suggestions -->
            </div>

            <div class="form-group mb-3">
                <label for="vehicule_id">Choisissez un véhicule :</label>
                <input type="hidden" id="vehicule_id" name="vehicule_id" required>
                <div class="d-flex flex-wrap">
                    @foreach($vehicules as $vehicule)
                        <div class="vehicle-item m-4" data-id="{{ $vehicule->id }}">
                            <img 
                                src="{{ asset('storage/'.$vehicule->imagevehicule) }}" 
                                alt="{{ $vehicule->libvehicule }}" 
                                style="width: 120px; height: 120px; margin: 10px; cursor: pointer; transition: transform 0.2s, border 0.2s; border-radius: 10px;"
                                onmouseover="this.style.transform='scale(2)'" 
                                onmouseout="this.style.transform='scale(1)'"
                                onclick="selectVehicle(this)"
                            >
                            <span>{{ $vehicule->libvehicule }}</span> <br>
                            <span>{{ $vehicule->prixparkilometre }} xof/km</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="client_id">ID Client :</label>
                <input type="number" class="form-control" id="client_id" name="client_id" value="{{ $client->id }}" required readonly>
            </div>

            <div class="form-group mb-3">
                <label for="dateheuresouhaite">Date et heure souhaitée :</label>
                <input type="datetime-local" class="form-control" id="dateheuresouhaite" name="dateheuresouhaite" required>
            </div>

            <!-- Champ caché pour le statut -->
            <input type="hidden" name="statut" value="{{ $statut ?? 'en_etude' }}">

            <!-- Champ caché pour le montant -->
            <input type="hidden" name="montant" value="{{ $montant ?? 0 }}">

            <!-- Champ caché pour la date de demande -->
            <input type="hidden" name="datedemande" value="{{ now() }}">
            
             <!-- Bouton pour afficher le récapitulatif -->
        <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-submit"></i> Afficher le récapitulatif</button>

            
        </div>

    </form>
</div>




@endsection