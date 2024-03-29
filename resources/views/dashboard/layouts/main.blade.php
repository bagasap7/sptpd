<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-SPTPD Rembang </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <link rel="stylesheet" href="{{ asset('public\vendors\bootstrap-datepicker\bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/air-datepicker/air-datepicker.css') }}">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css')}}">
  <!-- endinject -->

  <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
   
    @include('dashboard.layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      
      <!-- partial -->

      @include('dashboard.layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              @yield('container')
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        @include('dashboard.layouts.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  
  <!-- Plugin js for this page -->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>

  <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
  integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
  crossorigin=""></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page-->
  <script src="{{ asset('js/jquery/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendors/air-datepicker/air-datepicker.js') }}"></script>
  <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/dashboard.js') }}"></script>
  @stack('pajak')
  <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.6.0/autoNumeric.js"></script> --}}
  {{-- <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script> --}}

  
  @stack('scripts')
 
  
  <!-- End custom js for this page-->
</body>

</html>

