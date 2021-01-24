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
                                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Tambah User</a>
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
                    <h3 class="h6 text-uppercase mb-0">Tambah User</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Level</label>
                          <select class="form-control" name="level">
                              <option value="" holder>Pilih Level</option>
                              <option value="admin" holder>Admin</option>
                              <option value="penulis">Penulis</option>
                          </select>
                     </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Nama</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Pengguna" value="">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" value="">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Email</label>
                        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" value="">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label text-uppercase">Foto<i class="text-danger">* Boleh Dikosongi *</i></label>
                        <div>
                            <img class="product" width="200" height="200" />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="foto">
                        </div>
                    </div>
                        <button type="submit" class="btn btn-success">Tambah</button>
                  </form>
                  </div>
                </div>
              </div>
          </div>
      </section>
@endsection