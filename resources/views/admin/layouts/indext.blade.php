<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset('assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/admin/assets/vendors/css/vendor.bundle.base.css') }}>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href={{ asset('assets/admin/assets/css/style.css') }}>
    <!-- End layout styles -->
    <link rel="shortcut icon" href={{ asset('assets/admin/assets/images/favicon.ico') }} />
    <script src="{{ asset('assets/admin/assets/js/jquery.min.js') }}"></script>
</head>

<body>
    <div class="container-scroller">
        {{-- Dòng thông báo --}}
        {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> --}}
        {{-- Kết thúc --}}
        <!-- partial:partials/_navbar.html -->
        {{-- Bắt đầu hearder --}}
        @include('admin.layouts.header')
        {{-- Kết thúc --}}
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.layouts.menu')
            <!-- partial -->
            <div class="main-panel">
               
                    @yield('main_content')
                    <!-- main-panel ends -->
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="assets/vendors/js/vendor.bundle.base.js"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    {{-- <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script> --}}
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    {{-- <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script> --}}
    <!-- endinject -->
    <!-- Custom js for this page -->
    {{-- <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script> --}}
    <!-- End custom js for this page -->
</body>

</html>
