@extends('layouts.dashback')

@section('contenu_gestion_demandes')
<!-- partial -->
<div class="main-panel col-md-12">
    <div class="content-wrapper">
        @if(Auth::check() && Auth::user()->type_user_id == 3) <!-- Vérifie si l'utilisateur est admin -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">Gestion des Demandes</h2>
                    <div class="table-responsive">
                        <table id="userTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID client</th>
                                    <th>id vehicule </th>
                                    <th>date heure souhaitée</th>
                                    <th>point depart</th>
                                    <th>point arrivé</th>
                                    <th>statut</th>
                                    <th>montant</th>
                                    <th>date demande</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->client_id }}</td>
                                        <td>{{ $demande->vehicule_id }}</td>
                                        <td>{{ $demande->dateheuresouhaite }}</td>
                                        <td>{{ $demande->pointdepart }}</td>
                                        <td>{{ $demande->pointarrive }}</td>
                                        <td>{{ $demande->statut }}</td>
                                        <td>{{ $demande->montant }}</td>
                                        <td>{{ $demande->datedemande }}</td>                                        
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $demande->id }}">
                                                <i class="fa fa-edit"></i> Modifier
                                            </button>
                                            <form action="{{ route('demandedestroy', $demande->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande?');">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal pour modifier demande -->
                                    <div class="modal fade" id="editUserModal{{ $demande->id }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalLabel">Modifier la demande</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('demandeupdate', $demande->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                            <!-- Formulaire de modification demande -->                                                            
                                                               
                                                                <div class="form-group mb-3">                                                                    
                                                                    <input type="number" class="form-control" id="client_id" name="client_id" value="{{$demande->client_id}}" readonly>
                                                                </div>
                                                                <div class="form-group mb-3">                                                                    
                                                                    <input type="number" class="form-control" id="vehicule_id" name="vehicule_id" value="{{$demande->vehicule_id}}" readonly >
                                                                </div>                                                                
                                                                <div class="form-group mb-3">
                                                                    <label for="dateheuresouhaite">Date et heure souhaitée :</label>
                                                                    <input type="datetime" class="form-control" id="dateheuresouhaite" name="dateheuresouhaite" value="{{$demande->dateheuresouhaite}}"  >
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="pointdepart">Adresse de depart  :</label>
                                                                    <input type="text" class="form-control" id="pointdepart" name="pointdepart" value="{{$demande->pointdepart}}" required placeholder="ex: vedoko carrefour zezoume ">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="pointarrive">Adresse de destination :</label>
                                                                    <input type="text" class="form-control" id="pointarrive" name="pointarrive" value="{{$demande->pointarrive}}"  required placeholder="ex: godome pharmacie fignonhou " >
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                   <?php $statut ="en_etude" ?>
                                                                    <label for="statut">statut :</label>
                                                                    <input type="text" class="form-control" id="statut" name="statut" value="<?= $statut ?>"  required readonly >
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="montant">montant de la demande :</label>
                                                                    <input type="text" class="form-control" id="montant" name="montant" value="{{$demande->montant}}" required readonly >
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="datedemande">date de la demande :</label>
                                                                    <input type="texte" class="form-control" id="datedemande" name="datedemande" value="{{$demande->datedemande}}"  required readonly >
                                                                </div>                                                          
                                                               
                                                      
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>                   

                </div> <!-- End col-md-12 -->
            </div> <!-- End row -->
        @else
            <p>Accès refusé. Vous n'avez pas les autorisations nécessaires.</p> 
        @endif
    </div> <!-- content-wrapper ends -->
</div> <!-- main-panel ends -->

@endsection

