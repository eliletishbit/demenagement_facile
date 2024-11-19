@extends('layouts.dashback')

@section('contenu_gestion_client')
<!-- partial -->
<div class="main-panel col-md-12">
    <div class="content-wrapper">
        @if(Auth::check() && Auth::user()->type_user_id == 3) <!-- Vérifie si l'utilisateur est admin -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-bold">Gestion des Clients</h2>
                    <div class="table-responsive">
                        <table id="userTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Télephone</th>
                                    <th>Email</th>
                                    <th>Mot de passe</th>
                                    <th>Type d'Utilisateur</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->telnumber }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>{{ $user->type_user_id == 1 ? 'Client' : ($user->type_user_id == 2 ? 'Chauffeur' : 'Admin') }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">
                                                <i class="fa fa-edit"></i> Modifier
                                            </button>
                                            <form action="{{ route('userdestroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal pour modifier l'utilisateur -->
                                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalLabel">Modifier l'Utilisateur</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('userupdate', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                            <!-- Formulaire de modification de l'utilisateur -->                                                            
                                                               
                                                                <div class="form-group mb-3">
                                                                    <label for="name">Nom :</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required placeholder="ex: rodrigue AZERTY">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="telnumber">Numéro de téléphone :</label>
                                                                    <input type="text" class="form-control" id="telnumber" name="telnumber" value="{{$user->telnumber}}" required placeholder="ex:98737373">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="email">Email :</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required placeholder="ex: email@gmail.com ">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="password">Mot de passe :</label>
                                                                    <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" required placeholder="au moins 8 caractères ">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="password_confirmation">Confirmer le mot de passe :</label>
                                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{$user->password}}" required>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                <label for="type_user_id">Type d'utilisateur :</label>
                                                                <select class="form-control" id="type_user_id" name="type_user_id" required readonly>
                                                                    <option value="" disabled selected>Choisissez un type</option>
                                                                    @foreach($types as $type)
                                                                        <option value="{{ $type->id }}">{{ $type->libtype }}</option> 
                                                                    @endforeach
                                                                </select>
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

                    <!-- Barre de recherche -->
                    <div class="mb-3 mt-3">
                        <input type="text" id="searchInput" placeholder="Rechercher un utilisateur..." class="form-control">
                    </div>

                </div> <!-- End col-md-12 -->
            </div> <!-- End row -->
        @else
            <p>Accès refusé. Vous n'avez pas les autorisations nécessaires.</p> 
        @endif
    </div> <!-- content-wrapper ends -->
</div> <!-- main-panel ends -->

@endsection

@push('scripts')
<script src="{{ asset('js/data-table.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#userTable').DataTable({
            // Options de DataTables si nécessaire
        });

        // Fonctionnalité de recherche
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
@endpush