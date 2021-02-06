@extends('/template_frontend.content')
	
@section('isi')
@if(count($data)> 0)
<!-- page-banner section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Hasil Pencarian: {{ $cari }}</h1>
				<span>{{$data->count() }} Postingan</span>
			</div>
		</section>
		<!-- End page-banner section -->

<!-- blog section 
			================================================== -->
		<section class="blog-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="blog-box grid-style">
							<div class="row">
							@foreach($data as $list_post)
								<div class="col-md-6">
									<div class="news-post article-post">
										<div class="image-holder">
											<img src="{{asset($list_post->gambar) }}" alt="">
										</div>
										<a class="text-link" href="{{ route('blog.kategori', $list_post->kategori->slug) }}">{{$list_post->kategori->nama_kategori }}</a>
										<h2><a href="{{ route('blog.isi', $list_post->slug ) }}">{{ $list_post->judul }}</a></h2>
										<ul class="post-tags">
											<li>{{ $list_post->created_at->diffForHumans() }}</li>
											<li>{{ $list_post->komentar->count() }} komentar</li>
											<li>by <a href="{{ route('blog.user', $list_post->user->slug) }}">{{ $list_post->user->name }}</a></li>
										</ul>
										<p><?php echo \Illuminate\Support\Str::limit(strip_tags($list_post->konten), 150, $end='...') ?></p>
									</div>
								</div>
							@endforeach
							</div>
						</div>
						<div class="center-button">
							<a class="button-one" href="{{ route('blog.list') }}">Semua Postingan</a>
						</div>
						<div class="pagination-box">
    						<ul class="pagination-list">
							@include('template_frontend.pagination', ['paginator' => $data->appends(Request::except('page'))])
							</ul>
						</div>
					</div>
					@include('template_frontend.widget')
				</div>
			</div>
		</section>
		<!-- End blog section -->
@else
		<section class="page-banner-section">
			<div class="container">
				<h1>Hasil Pencarian</h1>
				<span>{{$data->count() }} Postingan</span>
			</div>
		</section>

		<section class="blog-section">
			<div class="container">
				<div class="single-post no-sidebar">
					<div class="title-single-post">
						<p>Tidak ada hasil</p>
					</div>
				</div>
				<div class="center-button">
					<a class="button-one" href="{{ route('blog.list') }}">Semua Postingan</a>
				</div>
			</div>
		</section>

@endif
@endsection