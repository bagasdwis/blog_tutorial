
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Admin | MI A1 Tutorial</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="{{ asset('assets/css/orionicons.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png?3') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/select2/css/select2.min.css')}}">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{asset('assets/summernote/summernote-bs4.css')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style type="text/css">
        .breadcrumb {
          background-color: transparent;
        }
        div.dataTables_wrapper {
        margin: 0 auto;
    }
    </style>
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="{{ route('home') }}" class="navbar-brand font-weight-bold text-uppercase text-base">MI A1 Tutorial</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item dropdown d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text text-gray-500">Hello, {{Auth::user()->name}} </span>
                @if(Auth::user()->foto == '')
                  <img style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"  src="{{asset('img/user/default.jpg')}}" alt="profile image">
                  @else
                  <img style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"  src="{{asset('img/user/'.Auth::user()->foto)}}" alt="profile image">
                  @endif
            </a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="{{ route('user.detail_user') }}" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">{{Auth::user()->name}}</strong><small style="text-transform: capitalize;">{{ Auth::user()->level }}</small></a>
              <div class="dropdown-divider"></div><a target="_blank" class="dropdown-item" href="/">Halaman Website</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('user.edit', Auth::user()->id)}}">Edit Profil</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	              @csrf
	          </form>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    
    @include('template_backend.sidebar')

      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">

          @yield('content')

        </div>
        
        @include('template_backend.footer')

      