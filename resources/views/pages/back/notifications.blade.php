@extends('layouts.dashback')

@section('contenu_notifications')
<div class="row w-100">
    <div class=" grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Notifications</p>
          <ul class="icon-data-list">
            @if(Auth::check() && Auth::user()->type_user_id == 1 )
              <li>
                <div class="d-flex">
                  <img src="{{asset('/images/faces/face1.jpg')}}" alt="user">
                  <div>
                    <p class="text-info mb-1">Isabella Becker</p>
                    <p class="mb-0">Sales dashboard have been created</p>
                    <small>9:30 am</small>
                  </div>
                </div>
              </li>
            @elseif(Auth::check() && Auth::user()->type_user_id === 2)
              <li>
                <div class="d-flex">
                  <img src="{{asset('/images/faces/face1.jpg')}}" alt="user">
                  <div>
                    <p class="text-info mb-1">Isabella Becker</p>
                    <p class="mb-0">Sales dashboard have been created</p>
                    <small>9:30 am</small>
                  </div>
                </div>
              </li>
            @elseif(Auth::check() && Auth::user()->type_user_id === 3)
              <li>
                <div class="d-flex">
                  <img src="{{asset('/images/faces/face1.jpg')}}" alt="user">
                  <div>
                    <p class="text-info mb-1">Isabella Becker</p>
                    <p class="mb-0">Sales dashboard have been created</p>
                    <small>9:30 am</small>
                  </div>
                </div>
              </li> 
            @else
                  <p>utilisateur inconnue</p>
                
            @endif
          </ul>
        </div>
      </div>
    </div>
</div>
@endsection
