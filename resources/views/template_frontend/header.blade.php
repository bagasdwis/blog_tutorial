<html lang="en" class="no-js">
<head>
	<title>MI A1 Tutorial</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/mite-assets.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix header-style2">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<a class="search-button" href="#"><i class="fa fa-search"></i></a>
					<form action="{{route('blog.cari')}}" method="get" class="form-search">
						<input type="search" name="cari" placeholder="Cari..."/>
						<button class="nav-close search-close">
								<span></span>
							</button>
					</form>

					<a href="/" class="navbar-brand font-weight-bold text-uppercase text-base">MI A1 Tutorial
					</a>

					<a class="open-menu" href="#"><i class="fa fa-align-justify"></i></a>
					
					<div class="collapse navbar-collapse" style="height: 65px;" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="drop-link">
								<a class="active" href="/">Home</a>
							</li>
							<li><a href="{{ route('blog.list') }}">Posts</a></li>
							<li class="drop-link">
								<a href="#">Kategori<i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul class="dropdown">
									@foreach($filter_kategori as $result1)
									<li><a href="{{ route('blog.kategori', $result1->slug) }}">{{ $result1->nama_kategori }}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="drop-link">
								<a href="#">Tags<i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul class="dropdown">
									@foreach($filter_tag as $result2)
									<li><a href="{{ route('blog.tag', $result2->slug) }}">{{ $result2->nama_tag }}</a></li>
									@endforeach
								</ul>
							</li>
							@if (Auth::guest())
					        <!-- Messages Dropdown Menu -->
					        <li class="nav-item">
					          <a class="nav-link" href="{{ route('login') }}">Login
					          </a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" href="{{ route('register') }}">Daftar
					          </a>
					        </li>
					        @else
					        <li class="drop-link">
								<a href="#">
					             {{ Auth::user()->name }}
					             <i class="fa fa-angle-down" aria-hidden="true"></i></a>
								<ul class="dropdown">
									<li>
										<a target="_blank" href="{{ route('home') }}" class="dropdown-item">Halaman {{ Auth::user()->level }}</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
					              		</a>
					              		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					                  		{{ csrf_field() }}
					              		</form>
					              	</li>
								</ul>
							</li>
					        @endif
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<!-- End Header -->