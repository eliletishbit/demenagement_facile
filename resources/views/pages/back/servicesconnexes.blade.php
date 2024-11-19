@extends('layouts.dashback')

@section('contenu_servicesconnexes')
<div class="row w-100">
    <div class=" grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title mb-0">Liste des services connexes</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>id</th>
                  <th>libellé du service</th>
                  <th>Description</th>
                  <th>Montant</th>
                  <th>Date demande</th>
                  <th>Statut</th>
                  <th>Statut</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $serviceconnexes as $sc)
                <tr>
                  <td>{{ $sc->id }}</td>                  
                  <td>{{ $sc->libservice }}</td>
                  <td>{{ $sc->Description}}</td>
                  <td class="font-weight-bold">{{ $sc->montant }}</td>
                  <td>{{ $sc->dateservice}}</td>
                  <td class="font-weight-medium">
                    <div class="badge badge-success">{{ $sc->gainprestataire }}</div>
                  </td>
                  <td class="font-weight-medium">
                    <div class="badge badge-warning">{{ $sc->gainagence }}</div>
                  </td>                               
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection