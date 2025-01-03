<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('dashboard')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    
    
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
    
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
</head>
<body>
    
    <!-- inclusion navbar -->
    @include('layouts.backpartials.headerback') 

    <div class="container-fluid page-body-wrapper">
        <!-- inclusion sidebar -->
        @include('layouts.backpartials.sidebarback') 
        
        <!--inclusion des contenus specifiques-->
        @yield('contenu_index')
        @yield('contenu_index_dash_client')
        @yield('contenu_index_dash_chauffeur')
        @yield('contenu_index_dash_admin')
        @yield('contenu_gestion_client')
        @yield('contenu_gestion_chauffeur')
        @yield('contenu_gestion_vehicules')
        @yield('contenu_listevehicules')
        @yield('contenu_gestion_demandes')
        @yield('contenu_creerdemande')
        @yield('contenu_notifications')
        @yield('contenu_servicesconnexes')
        @yield('contenu_recaps')
        @yield('contenu_suivi')
    </div>  
    
    <!-- inclusion footer -->
    @include('layouts.backpartials.footerback')

<!-- jQuery (doit être chargé en premier) -->
<script src="{{asset('js/jquery.js')}}"></script>

<!-- Bootstrap JS (si vous utilisez Bootstrap 4 ou 5) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>

<!-- Plugin js for this page -->
<script src="{{ asset('vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>

<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>

<!-- Custom js for this page-->
<script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/index.js') }}"></script>

</body>
</html>

