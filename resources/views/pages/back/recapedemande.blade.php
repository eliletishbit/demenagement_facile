@extends('layouts.dashback')

@section('contenu_recaps')

<div class="container mt-4 mb-4" style="width:40%;">
    <h1>Récapitulatif de la Demande</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Détails de la Demande</h5>
            <p><strong>Adresse de départ :</strong> {{ $pointdepart }}</p>
            <p><strong>Adresse de destination :</strong> {{ $pointarrive }}</p>
            <p><strong>Distance :</strong> {{ $distance }} km</p> <!-- Utilisation de la distance formatée -->
            <p><strong>Montant :</strong> {{ $montant }} XOF</p> <!-- Utilisation du montant formaté -->
            <p><strong>Date et Heure souhaitées :</strong> {{ $dateheuresouhaite }}</p>
            <p><strong>Statut :</strong> {{ $statut }}</p>
            <p><strong>Date de demande :</strong> {{ $datedemande }}</p>

            <div class="d-flex justify-content-between">
                <!-- Formulaire pour approuver la demande -->
                <form action="{{ route('approveDemande') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pointdepart" value="{{ $pointdepart }}">
                    <input type="hidden" name="pointarrive" value="{{ $pointarrive }}">
                    <input type="hidden" name="distance" value="{{ floatval($distance) }}"> <!-- Passer la valeur brute -->
                    <input type="hidden" name="montant" value="{{ floatval($montant) }}"> <!-- Passer la valeur brute -->
                    <input type="hidden" name="vehicule_id" value="{{ $vehicule_id }}">
                    <input type="hidden" name="client_id" value="{{ $client_id }}">
                    
                    <input type="datetime-local" name="dateheuresouhaite" value="{{ $dateheuresouhaite }}" hidden>
                    <input type="hidden" name="statut" value="{{ $statut }}">
                    <input type="hidden" name="datedemande" value="{{ $datedemande }}">
                    <button type="submit" class="btn btn-success">Approuver la Demande</button>
                </form>

                <!-- Formulaire pour annuler la demande -->
                <form action="{{ route('cancelDemande') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection