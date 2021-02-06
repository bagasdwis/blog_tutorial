@extends('/template_frontend.content')
	
@section('isi')
	<!-- top-images-section 
			================================================== -->
		<section class="top-slider-section background-grey">
			<div class="container">
				<div class="top-slider-box text-center">
					<div class="owl-wrapper">
						<div class="owl-carousel" data-num="1">
						@foreach($data2 as $post)
							<div class="item">
								<div class="news-post image-post">
									<img src="{{ $post->gambar }}" alt="">
									<div class="hover-post">
										<div><a class="category-link" href="{{ route('blog.kategori', $post->kategori->slug) }}">{{ $post->kategori->nama_kategori }}</a></div>
										<h2><a href="{{ route('blog.isi', $post->slug ) }}">{{ $post->judul }}</a></h2>
										<ul class="post-tags">
											<li>{{ $post->komentar->count() }} komentar</li>
											<li>{{ $post->created_at->diffForHumans() }}</li>
											<li>by <a href="{{ route('blog.user', $post->user->slug) }}">{{ $post->user->name }}</a></li>
										</ul>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End top-images section -->
		<!-- latest-section 
			================================================== -->
		<section class="latest-section">
			<div class="container">
				<div class="title-section">
					<div class="row">
						<div class="col-md-5">
							<h1>Postingan Terbaru</h1>
						</div>
						<div class="col-md-7">
							<ul class="filter-list filter">
								<li><a href="#" class="active" data-filter=".all">All</a></li>
								@foreach($filter_kategori as $hasil)
								<li><a href="#" data-filter=".{{$hasil->slug }}">{{$hasil->nama_kategori }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>

				<div class="latest-box iso-call">
				@foreach($data as $post_terbaru)
					<div class="item all">
						<div class="news-post article-post">
							<div class="image-holder">
								<img src="{{ $post_terbaru->gambar }}" alt="">
							</div>
							<a class="text-link" href="{{ route('blog.kategori', $post_terbaru->kategori->slug) }}">{{ $post_terbaru->kategori->nama_kategori }}</a>
							<h2><a href="{{ route('blog.isi', $post_terbaru->slug ) }}">{{ $post_terbaru->judul }}</a></h2>
							<ul class="post-tags">
								<li>{{ $post_terbaru->created_at->diffForHumans() }}</li>
								<li>{{ $post_terbaru->komentar->count() }} komentar</li>
								<li>by <a href="{{ route('blog.user', $post_terbaru->user->slug) }}">{{ $post_terbaru->user->name }}</a></li>
							</ul>
							<p><?php echo \Illuminate\Support\Str::limit(strip_tags($post_terbaru->konten), 150, $end='...') ?></p>
						</div>
					</div>
				@endforeach
				</div>

				<div class="latest-box iso-call">
				@foreach($data3 as $post_terbaru)
					<div class="item {{$post_terbaru->kategori->slug }}">
						<div class="news-post article-post">
							<div class="image-holder">
								<img src="{{ $post_terbaru->gambar }}" alt="">
							</div>
							<a class="text-link" href="{{ route('blog.kategori', $post_terbaru->kategori->slug) }}">{{ $post_terbaru->kategori->nama_kategori }}</a>
							<h2><a href="{{ route('blog.isi', $post_terbaru->slug ) }}">{{ $post_terbaru->judul }}</a></h2>
							<ul class="post-tags">
								<li>{{ $post_terbaru->created_at->diffForHumans() }}</li>
								<li>{{ $post_terbaru->komentar->count() }} komentar</li>
								<li>by <a href="{{ route('blog.user', $post_terbaru->user->slug) }}">{{ $post_terbaru->user->name }}</a></li>
							</ul>
							<p><?php echo \Illuminate\Support\Str::limit(strip_tags($post_terbaru->konten), 150, $end='...') ?></p>
						</div>
					</div>
				@endforeach
				</div>

				<div class="center-button">
					<a class="button-one" href="{{ route('blog.list') }}">Semua Postingan</a>
				</div>

			</div>
		</section>
		<!-- End latest section -->
@endsection
