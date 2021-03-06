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
                                    <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Tambah Kategori</a>
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
                    <h3 class="h6 text-uppercase mb-0">Tambah Kategori</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="POST">
 					@csrf
                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Nama Kategori</label>
                        <input type="text" placeholder="Nama Kategori" name="nama_kategori" class="form-control">
                      </div>
                      <div class="form-group">       
                        <button type="submit" class="btn btn-success">Tambah</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
      </section>
@endsection