@extends('layouts.dashback')

@section('contenu_gestion_vehicules')
<!-- partial -->
<div class="container w65 mt-4 mb-4">
        
    @if(Auth::check() && Auth::user()->type_user_id == 2 || Auth::user()->type_user_id == 3 ) <!-- Vérifie si l'utilisateur est admin -->
            
        <!-- Modal pour modifier l'utilisateur -->
          <h1>GESTION DES VEHICULES</h1> 
       @if(Auth::user()->type_user_id==3)
        <form action="{{route('listevehicules')}}">
            @csrf
            <button type="submit" class="btn btn-danger btn-lg"><i class="fa fa-submit"></i> consulter </button>
            
            </form>
        @endif            
        
        <form class="mt-4" action="{{ route('addvehicules') }}" method="POST" enctype="multipart/form-data" >
        @csrf                                                  
        
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
                <!-- Formulaire de modification de l'utilisateur -->                                                            
                    
                    <div class="form-group mb-3">
                        <label for="libvehicule">Nom du vehicule:</label>
                        <input type="text" class="form-control" id="libvehicule" name="libvehicule" value="" required placeholder="ex: toyota">
                    </div>

                    <div class="form-group mb-3">
                        <label for="immatr">immatriculation:</label>
                        <input type="text" class="form-control" id="immatr" name="immatr" value="" required placeholder="ex: OABC">
                    </div>

                    <div class="form-group mb-3">
                        <label for="imagevehicule">image du vehicule:</label>
                        <input type="file" class="form-control" id="imagevehicule" name="imagevehicule" value="" required >
                    </div>

                    <div class="form-group mb-3">
                        <label for="prixparkilometre">prix par kilometre :</label>
                        <input type="number" class="form-control" id="prixparkilometre" name="prixparkilometre" value="" required placeholder="ex:98737373">
                    </div>
                    <div class="form-group mb-3">                        
                        <?php $defaut = "disponible"; ?>
                        <input type="statut" class="form-control" id="statut" name="statut" value="<?= $defaut; ?>" hidden >
                    </div>
                    
                    <div class="form-group mb-3"> 
                        <input type="chauffeur_id" class="form-control" id="chauffeur_id" name="chauffeur_id" value="{{$chauffeur->id}}" required readonly>
                    
                    </div>
                    

                    <label for="type_vehicule_id">id type vehicule :</label>
                    <select class="form-control" id="type_vehicule_id" name="type_vehicule_id" required @readonly(true)>
                        <option value="" disabled selected>Choisissez un type</option>
                        @foreach($typesv as $typev)
                            <option value="{{ $typev->id }}">{{ $typev->libtype }}</option> 
                        @endforeach
                    </select>

                    <br>
                    <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-submit"></i> Ajouter </button>
                    
                          
        </div>
    </form>
            

    

    @endif
</div>
@endsection

             

                    
