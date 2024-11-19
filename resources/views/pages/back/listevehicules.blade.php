@extends('layouts.dashback')

@section('contenu_listevehicules')
<!-- partial -->
<div class="main-panel col-md-12">
    <div class="content-wrapper">
        @if(Auth::check() && Auth::user()->type_user_id == 3 || Auth::user()->type_user_id == 2 ) <!-- Vérifie si l'utilisateur est admin -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">liste des vehicules</h2>
                    <div class="table-responsive">
                        <table id="userTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom vehicule</th>
                                    <th>immatriculation</th>
                                    <th>image</th>
                                    <th>prix par kilometre</th>
                                    <th>statut</th>
                                    <th>id chauffeur</th>
                                    <th>id type vehicule</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicules as $vehicule)
                                    <tr>
                                        <td>{{ $vehicule->id }}</td>
                                        <td>{{ $vehicule->libvehicule }}</td>
                                        <td>{{ $vehicule->immatr }}</td>
                                        <td><img src="/storage/{{$vehicule->imagevehicule}}" /></td>
                                        <td>{{ $vehicule->prixparkilometre }}</td>
                                        <td>{{ $vehicule->statut }}</td>
                                        <td>{{ $vehicule->chauffeur_id }}</td>
                                        <td>{{ $vehicule->type_vehicule_id }}</td>
                                        <td>
                                           
                                            <form action="{{ route('vehiculesdestroy', $vehicule->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce vehicule ?');">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
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

