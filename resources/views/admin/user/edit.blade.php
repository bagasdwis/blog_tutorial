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
                                    @if(auth()->user()->level == 'admin')
                                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a>
                                    </li>
                                    @endif
                                    <li class="breadcrumb-item"><a>Edit User</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <section>
            <div class="row">
              <!-- Basic Form-->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Edit User</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('user.update', $user->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    
                    @if(auth()->user()->level == 'admin')
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Level</label>
                          <select class="form-control" name="level">
                            <option value="admin" @if($user->level == 'admin') selected @endif>Admin</option>
                            <option value="penulis" @if($user->level == 'penulis') selected @endif>Penulis</option>
                        </select>
                     </div>
                     @endif
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Nama</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Username</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" readonly="">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"  readonly="">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Password</label>
                        <input id="password" type="password" class="form-control" onkeyup='check();' name="password">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Konfirmasi Password</label>
                        <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Foto<i class="text-danger">* Boleh Dikosongi *</i></label>
                        <div>
                            <img class="product" width="200" height="200" @if($user->foto) src="{{ asset('img/user/'.$user->foto) }}" @endif />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto">
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                  </div>
                </div>
              </div>
          </div>
      </section>
@endsection