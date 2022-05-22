<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TechnoResto - @yield('title')</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    {{---dropzone lib---}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->


    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/components.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/core/colors/palette-gradient.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

       <!-- BEGIN: Vendor JS-->
       <script src="{{ asset('admin/assets/vendors/js/vendors.min.js') }}"></script>

       <script
       type="text/javascript"
       src="//code.jquery.com/jquery-2.2.3.js"
       
     ></script>
   
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
 
   
   
</head>
<!-- END: Head-->
   

  <!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
          <div class="navbar-wrapper">
            <div class="navbar-header">
              <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
              <li class="nav-item"><a class="navbar-brand" href="{{url('/my_admin') }}"><img class="brand-logo" alt="envision admin logo" src="{{ asset('img/logo.png') }}">
                    <h4 class="brand-text" style="padding-left: 0">TechnoResto</h4></a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
              </ul>
            </div>
            <div class="navbar-container content">
              <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                  <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                  <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                  <li class="nav-item d-none d-lg-block"><a class="nav-link " href="https://TechnoResto.tn" target="_blank">Site web</a></li>
                  
                </ul>
                <ul class="nav navbar-nav float-right">
                  
                  
                
                  <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">{{ Auth::user()->name }}</span><span class="avatar avatar-online"><img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"><i></i></span></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('profile.show') }}">
                          <i class="ft-user"></i> Modifier Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <a class="dropdown-item"  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                          this.closest('form').submit();">
                              <i class="ft-power"></i> Logout
                          </a>
                          
                      </form>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <!-- END: Header-->
        @extends('admin.menu')

        
        @if (session('status'))
        <div class="app-content">
            <div class="alert alert-success col-xs-3 pull-right fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="clearfix" ></div>
          </div>
        @endif
       
      </div> <!-- END: Notification Content -->
        @yield('content')
        @yield('script')
       
        <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
            <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2021 <a class="text-bold-800 grey darken-2" href="https://envision.com.tn" target="_blank">Envision Agency</a></span><span class="float-md-right d-none d-lg-block">Made with <i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
          </footer>
          <!-- END: Footer-->
      
          
             
          <!-- BEGIN Vendor JS-->
      
          <!-- BEGIN: Page Vendor JS-->
          <script src="{{ asset('admin/assets/vendors/js/charts/chart.min.js') }}"></script>
          <script src="{{ asset('admin/assets/vendors/js/charts/echarts/echarts.js') }}"></script>
          <!-- END: Page Vendor JS-->
      
          <!-- BEGIN: Theme JS-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
          <script src="{{ asset('admin/assets/js/core/app-menu.min.js') }}"></script>
          <script src="{{ asset('admin/assets/js/core/app.min.js') }}"></script>
          <script src="{{ asset('admin/assets/js/scripts/customizer.min.js') }}"></script>
          <script src="{{ asset('admin/assets/js/scripts/footer.min.js') }}"></script>
          <!-- END: Theme JS-->
      
          <!-- BEGIN: Page JS-->
          <script src="{{ asset('admin/assets/js/scripts/pages/appointment.min.js') }}"></script>
          <!-- END: Page JS-->
      
        </body>
        <!-- END: Body-->
      
      </html>
