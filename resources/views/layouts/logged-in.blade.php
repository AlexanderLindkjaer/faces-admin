<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body>
    <div id="app">
      @include('navbar.navbar')

  <div class="container-fluid" id="main">
      <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-md-3 col-lg-2 sidebar-offcanvas pl-0 h-100 bg-seconday" id="sidebar" role="navigation">
              <ul class="nav flex-column sticky-top pl-0 pt-5 mt-4">
                  <li class="nav-item"><a class="nav-link" href="{{ route('faces') }}" {{ ( (Route::currentRouteName() == 'home') ? 'id=active_menu' : '') }}
                    >Faces</a></li>
                  <!-- <li class="nav-item">
                      <a class="nav-link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Reports▾</a>
                      <ul class="list-unstyled flex-column pl-3 collapse" id="submenu1" aria-expanded="false">
                         <li class="nav-item"><a class="nav-link" href="">Report 1</a></li>
                         <li class="nav-item"><a class="nav-link" href="">Report 2</a></li>
                      </ul>
                  </li>
                  -->

                  <li class="nav-item">  <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span class="nav_title">Log out</span>
                    </a></li>

              </ul>
          </div>
          <!--/col-->

          <div class="col main pt-5  h-100">
            <div class="container mt-4">
              @yield('content')
            </div>
          </div>

      </div>

  </div>



  </div>
</body>
</html>
