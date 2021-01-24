@extends('template_backend.master_auth')

@section('content')        
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{ asset('assets/img/illustration.svg') }}" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4"><a href="/" class="navbar-brand font-weight text-uppercase text-base">MI A1 Tutorial | Login</a></h1>
            <h2 class="mb-4">Selamat Datang Kembali!</h2>
            <p class="text-muted">Silahkan Login, masukkan username atau email dan password yang sudah terdaftar.</p>
            <form method="POST" action="{{ route('login') }}">
              {{csrf_field()}}
                  <div class="form-group mb-4">
                      <input id="username" type="text" class="form-control border-0 shadow form-control-lg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username atau Email" autofocus>
                  </div>

                  <div class="form-group mb-4">
                      <input id="password" type="password" class="form-control border-0 shadow form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                  </div>

                  <div class="form-group mb-4">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" checked class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <label class="custom-control-label" for="remember">
                                        {{ __('Ingat Saya') }}
                          </label>
                      </div>
                  </div>
                  <div class="form-group mb-4">
                      <button type="submit" class="btn btn-primary shadow px-5">
                          {{ __('Log in') }}
                      </button>
                  </div>
            </form>
          </div>
        </div>
@endsection