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
                                    <li class="breadcrumb-item"><a>Detail Post</a>
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
                    <h3 class="h6 text-uppercase mb-0">Detail Post</h3>
                  </div>
                  <div class="card-body">
                    <img width="950" height="500" src="{{asset($post->gambar) }}" alt="">
                    <div class="post-content">
                      <div class="post-content-text">
                        <span class="badge badge-pill badge-danger" href="{{ route('blog.kategori', $post->kategori->slug) }}">{{$post->kategori->nama_kategori }}</span>
                        <h1>{{ $post->judul }}</h1>
                        <p>{{ $post->created_at->diffForHumans() }} | by {{ $post->user->name }}</p>
                        <p>{{ $post->deskripsi }}</p>
                        <p>{!! $post->konten !!}</p>
                        Tags : 
                        @foreach($post->tag as $tag)
                          <span class="badge badge-pill badge-secondary">{{ $tag->nama_tag }}</span>
                        @endforeach
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </section>
@endsection