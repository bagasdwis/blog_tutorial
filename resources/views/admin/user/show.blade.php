@extends('template_backend.master')

@section('content')
          <section class="content-header py-4">
          <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Home</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="o-home-1"></span></a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Profil Saya</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <section>
            <div class="row mb-4">
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Profil Saya</h2>
                  </div>
                  <div class="card-body">
                  	<!-- Profile Image -->
                <div class="text-center">
                  @if(Auth::user()->foto == '')
                  <img style="max-width: 10rem;" class="img-fluid rounded-circle shadow"  src="{{asset('img/user/default.jpg')}}" alt="profile image">
                  @else
                  <img style="max-width: 10rem;" class="img-fluid rounded-circle shadow"  src="{{asset('img/user/'.Auth::user()->foto)}}" alt="profile image">
                  @endif
                </div><br><br>

                <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-gray"><i class="fas fa-user"></i></div>
                        <div class="text">
                          <b>Nama</b>
                        </div>
                      </div>
                      <div class="right">
                        <p>{{auth()->user()->name}}</p>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-gray"><i class="fas fa-user-friends"></i></div>
                        <div class="text">
                          <b>Level</b>
                        </div>
                      </div>
                      <div class="right">
                        <p style="text-transform: capitalize;">{{auth()->user()->level}}</p>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-gray"><i class="fas fa-user-check"></i></div>
                        <div class="text">
                          <b>Username</b>
                        </div>
                      </div>
                      <div class="right">
                        <p>{{auth()->user()->username}}</p>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center mb-4 flex-column flex-sm-row">
                      <div class="left d-flex align-items-center">
                        <div class="icon icon-lg shadow mr-3 text-gray"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                          <b>Email</b>
                        </div>
                      </div>
                      <div class="right">
                        <p>{{auth()->user()->email}}</p>
                      </div>
                    </div>
                  </div>
                </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection