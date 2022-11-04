<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Traders Hub | Admin Log in</title>
    <link rel="icon" type="image/png" href="{{ asset('traders-assets/img/cropped-fav-512x450.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('traders-assets/bootstrap/css/bootstrap.min.css') }}">
    
    {{-- <link rel="stylesheet" href="{{ asset('traders-assets/icomoon/style.css') }}" /> --}}
    
    <link rel="stylesheet" href="{{ asset('traders-assets/font-awesome/css/font-awesome.min.css') }}" />
    
    @yield('css')
    <link rel="stylesheet" href="{{ asset('traders-assets/css/style.css') }}"/>
  </head>

  <body>
      <!-- start page container -->
      <div class="page-container">
          <!-- start page sidebar -->
          <div class="page-sidebar">
              <a class="logo-box" href="#">
                  <img src="{{ asset('traders-assets/img/admin-logo.png') }}" alt="">
                  <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                  <i class="icon-close" id="sidebar-toggle-button-close"></i>
              </a>

              <!-- Main Sidebar Container -->
              <div class="page-sidebar-inner">
                @include('partials.sidebar')
              </div>

          </div>
          <!-- end page sidebar -->
          <!-- start page content -->
          <div class="page-content">
              <!-- start page header -->
              <div class="page-header">
                <!-- Main Navbar Container -->
                @include('partials.nav')
              </div>
              <div class="page-inner">
              <div class="d-flex justify-content-between align-items-center mb-3">
                {{-- <ol class="breadcrumb">
                  @yield('breadcrumb')
                </ol> --}}
                <div class="breadcrumb">
                  <ul>
                    {{-- <li><a href="#"><img src="{{ asset('traders-assets/img/home-icon.png') }}" alt=""></a></li>
                    <li><a href="#!">Pages</a></li>
                    <li><a href="#!">User</a></li>
                    <li><span class="active">User Settings</span></li> --}}
                    <li><a href="{{ route('dashboard.index') }}"><img src="{{ asset('traders-assets/img/home-icon.png') }}" alt=""></a></li>
                    @yield('breadcrumb')
                  </ul>
                </div>
                  @yield('create-button')
              </div>
                <!-- <div class="page-title">
                    <h3 class="breadcrumb-header">Statistics Cards</h3>
                    <p class="mb-0">Horizontal Icon, Vertical Icon, Area Chart, Line Chart & More…</p>
                </div> -->
                @yield('content')
                <div class="page-footer">

                    <p>Copyright &copy; 2022 FU ACADEMY</p>
                    <!-- <p>Hand-crafted & Made with</p> -->
                </div>
            </div>
        </div>
      <!-- sidebar -->


      <!-- jQuery -->


      <!-- Bootstrap Js -->
      <script src="{{ asset('traders-assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('traders-assets/js/popper/popper.min.js') }}"></script>
      <script src="{{ asset('traders-assets/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('traders-assets/js/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
      <!-- <script src="traders-assets/js/dashboard.js"></script> -->
      <script src="{{ asset('traders-assets/js/custome.js') }}"></script>
      @yield('js')
  </body>

</html>