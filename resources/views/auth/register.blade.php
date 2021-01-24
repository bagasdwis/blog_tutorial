@extends('template_backend.master_auth')

@section('content')
<div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{ asset('assets/img/illustration.svg') }}" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4"><a href="/" class="navbar-brand font-weight text-uppercase text-base">MI A1 Tutorial | Daftar Penulis</a></h1>
            <h2 class="mb-4">Selamat Datang</h2>
            <p class="text-muted">Silahkan mendaftar sebagai penulis, isi semua kolom dengan benar.</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mb-4">
                    <input id="name" type="text" class="form-control border-0 shadow form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <input id="username" type="text" class="form-control border-0 shadow form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <input id="email" type="email" class="form-control border-0 shadow form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <input id="password" type="password" class="form-control border-0 shadow form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <input id="password-confirm" type="password" class="form-control border-0 shadow form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                </div>
                    <button type="submit" class="btn btn-primary shadow px-5">
                        {{ __('Register') }}
                    </button>
            </form>
          </div>
        </div>
@endsection
