
<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('dashboard')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />

    <!--datatables et dependances/extensions-->
    <link href="{{asset('css/DataTables/datatables.min.css')}}" rel="stylesheet">
    
  </head>
  <body>
    
      
      <!-- inclusion navbar -->
      @include('layouts.backpartials.headerback') 

  <div class="container-fluid page-body-wrapper">
      <!-- inclusion sidebar -->
      @include('layouts.backpartials.sidebarback') 
        
      <!--inclusion des contenus specifiques-->
      @yield('contenu_index')
      <!--contenu index dashboard client-->
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

       
      
      
  </div>  
  
  <!-- inclusion footer -->
  @include('layouts.backpartials.footerback')
        








      
          
   
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="{{asset('vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/template.js')}}"></script>
    <script src="{{asset('js/settings.js')}}"></script>
    <script src="{{asset('js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
    <script src="{{asset('js/DataTables/datatables.min.js')}}"></script>
  </body>
</html>