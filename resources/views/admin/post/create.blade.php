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
                                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Tambah Post</a>
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
                    <h3 class="h6 text-uppercase mb-0">Tambah Post</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Kategori</label>
                        <select class="form-control" name="kategori_id">
                          <option value="" holder>Pilih Kategori</option>
                          @foreach($kategori as $result)
                          <option value="{{ $result->id }}">{{  $result->nama_kategori }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Tag</label>
                        <select class="placeholder-multiple form-control select2" multiple="" name="tag[]">
                            @foreach($tag as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->nama_tag }}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Deskripsi</label>
                        <textarea id="deskripsi"  placeholder="Deskripsi" class="form-control" rows="3" name="deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label text-uppercase">Konten</label>
                      <textarea class="form-control textarea" name="konten" id="konten" placeholder="Konten"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Thumbnail</label>
                        <div>
                          <img class="product" width="350" height="200" />
                          <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                        </div>
                    </div>
                    @if(auth()->user()->level == 'admin')
                    <div class="form-group">
                      <label >Status</label>
                        <select class="form-control" name="status">
                            <option value="" holder>Pilih Status</option>
                            <option value="0">Hide</option>
                            <option value="1">Show</option>
                        </select>
                    </div>
                    @endif
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