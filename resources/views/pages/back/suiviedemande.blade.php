@extends('layouts.dashback')

@section('contenu_suivi')

<div class="container mt-4 mb-4">
    <h1 class="text-center">Suivi de Votre Demande</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(!$demande)
        <div class="alert alert-warning text-center">
            Aucune demande trouvée.
        </div>
    @else
        <!-- Affichage de la barre de progression -->
        <div class="mb-4">
            @php
                // Définir les couleurs basées sur le statut
                $progressColor = '';

                switch ($demande->statut) {
                    case 'en_etude':
                        $progressColor = 'bg-secondary';
                        break;
                    case 'en_attente':
                        $progressColor = 'bg-warning';
                        break;
                    case 'en_cours':
                        $progressColor = 'bg-info';
                        break;
                    case 'termine':
                        $progressColor = 'bg-success';
                        break;
                    default:
                        $progressColor = 'bg-danger'; // Pour les statuts inconnus
                }
            @endphp

            <div class="progress">
                <div class="progress-bar {{ $progressColor }}" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                    Statut : {{ ucfirst($demande->statut) }}
                </div>
            </div>
        </div>

        <!-- Affichage des détails de la dernière demande -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Point de départ</th>
                        <th scope="col">Point d'arrivée</th>
                        <th scope="col">Distance (km)</th>
                        <th scope="col">Montant (XOF)</th>
                        <th scope="col">Date et Heure souhaitées</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Date de demande</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $demande->pointdepart }}</td>
                        <td>{{ $demande->pointarrive }}</td>
                        <td>{{ number_format($demande->distance, 2) }}</td>
                        <td>{{ number_format($demande->montant, 2) }}</td>
                        <td>{{ $demande->dateheuresouhaite }}</td>
                        <td><span class="badge 
                            @if($demande->statut == 'en_etude') badge-secondary 
                            @elseif($demande->statut == 'en_attente') badge-warning 
                            @elseif($demande->statut == 'en_cours') badge-info 
                            @else badge-success @endif">{{ ucfirst($demande->statut) }}</span></td>
                        <td>{{ $demande->datedemande }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Optionnel : Ajouter un bouton pour revenir à la page précédente ou à la page principale -->
        <div class="text-center mt-4">
            <a href="{{ route('creerdemandeview') }}" class="btn btn-primary">Retourner à la Création de Demande</a>
        </div>
    @endif
</div>

@endsection