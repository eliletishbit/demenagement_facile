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

            <form id="demandeform" action="{{ route('creerdemande') }}" method="POST">
                @csrf
               
                <div class="modal-body">
                        <!-- Formulaire de creation de la demande -->                                                            
                            <div class="form-group mb-3">
                                <label for="pointdepart">Adresse de depart  :</label>
                                <input type="text" class="form-control" id="pointdepart" name="pointdepart" oninput="updateMontant()"   required placeholder="ex: vedoko carrefour zezoume ">
                            </div>
                            <div class="form-group mb-3">
                                <label for="pointarrive">Adresse de destination :</label>
                                <input type="text" class="form-control" id="pointarrive" name="pointarrive" oninput="updateMontant()"  required placeholder="ex: godome pharmacie fignonhou " >
                            </div>

                            <div class="form-group mb-3">
                                <label for="vehicule_id">vehicule :</label>
                                <select class="form-control" id="vehicule_id" name="vehicule_id" required @readonly(true)>
                                    <option value="" disabled selected>Choisissez un vehicule</option>
                                    @foreach($vehicules as $vehicule)
                                        <option value="{{ $vehicule->id }}">{{ $vehicule->libvehicule }}    </option>  
                                    @endforeach
                                    
                                </select>
                                <ul class="mt-2">
                                    @foreach($vehicules as $vehicule)
                                       <img style="width:75px; height:75px" src="{{asset('storage/'.$vehicule->imagevehicule)}}"  >                                         
                                    @endforeach
                                </ul>
                            </div>                        

                            <div class="form-group mb-3">
                                <label for="client_id">id client :</label>
                                <input type="number" class="form-control" id="client_id" name="client_id" value="{{$client->id}}"  required  readonly >
                            </div>                                                                                    
                            <div class="form-group mb-3">
                                <label for="dateheuresouhaite">Date et heure souhaitée :</label>
                                <input type="datetime-local" class="form-control" id="dateheuresouhaite" name="dateheuresouhaite" required >
                            </div>
                            

                            <div class="form-group mb-3">
                               <?php $statut="en_etude" ?>
                                <label for="statut">statut :</label>
                                <input type="text" class="form-control" id="statut" name="statut" value="<?= $statut ?>"  required readonly >
                            </div>

                            <div class="form-group mb-3">
                                <?php  $montant= 0; ?>
                                
                                <input type="text" class="form-control" id="montant" name="montant" value="<?= $montant ?>" hidden readonly >
                            </div>

                            <div class="form-group mb-3">
                                <label for="datedemande">date de la demande :</label>
                                <input type="date" class="form-control" id="datedemande" name="datedemande" value="<?= date('Y-m-d') ?>"  required readonly >
                            </div>

                            <button type="submit" class="btn btn-info btn-lg"><i class="fa fa-submit"></i> Envoyer la demande </button>
                    
                           
                  
                </div>

                
                
            </form>
           
        </div>


@endsection 