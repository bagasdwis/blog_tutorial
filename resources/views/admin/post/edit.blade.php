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
                                    <li class="breadcrumb-item"><a>Edit Post</a>
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
                    <h3 class="h6 text-uppercase mb-0">Edit Post</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('post.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Judul</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $post->judul }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Kategori</label>
                        <select class="form-control" name="kategori_id">
                          <option value="" holder>Pilih Kategori</option>
                          @foreach($kategori as $result)
                          <option value="{{ $result->id }}"
                          @if($result->id == $post->kategori_id)
                            selected
                          @endif
                            >{{  $result->nama_kategori }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Tag</label>
                        <select class="placeholder-multiple form-control select2" multiple="" name="tag[]">
                            @foreach($tag as $tag)
                            <option value="{{ $tag->id }}"
                            @foreach($post->tag as $value)
                              @if($tag->id == $value->id)
                              selected
                              @endif
                            @endforeach         
                              >{{ $tag->nama_tag }}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label text-uppercase">Konten</label>
                      <textarea class="edit-konten form-control textarea" name="konten">{{ $post->konten }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Thumbnail</label>
                        <div>
                          <img class="product" width="350" height="200" @if($post->gambar) src="{{ asset($post->gambar) }}" @endif  />
                          <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                        </div>
                    </div>
                    @if(auth()->user()->level == 'admin')
                    <div class="form-group">
                        <label>Status</label>
                          <select class="form-control" name="status">
                            <option value="" holder>Pilih Status</option>
                            <option value="0" @if($post->status == '0') selected @endif>Hide</option>
                            <option value="1" @if($post->status == '1') selected @endif>Show</option>
                          </select>
                    </div>
                    @endif
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>
          </div>
      </section>
@endsection