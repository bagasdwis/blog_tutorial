@extends('/template_frontend.content')
	
@section('isi')

		<!-- top-images-section 
			================================================== -->
		<section class="top-slider-section">
			<div class="container">
				<div class="top-slider-box">
					<div class="row">
						<div class="col-lg-8">
							<div class="owl-wrapper">
								<div class="owl-carousel" data-num="1">
								@foreach($data2 as $top_post)
									<div class="item">
										<div class="news-post image-post">
											<img src="{{ $top_post->gambar }}" alt="">
											<div class="hover-post overlay-bg">
												<div><a class="category-link" href="{{ route('blog.kategori', $top_post->kategori->slug) }}">{{ $top_post->kategori->nama_kategori }}</a></div>
												<h2><a href="{{ route('blog.isi', $top_post->slug ) }}">{{ $top_post->judul }}</a></h2>
												<ul class="post-tags">
													<li>{{ $top_post->created_at->diffForHumans() }}</li>
													<li>by <a href="{{ route('blog.user', $top_post->user->slug) }}">{{ $top_post->user->name }}</a></li>
												</ul>
												<p>{{ $top_post->deskripsi }}...</p>
											</div>
										</div>
									</div>
								@endforeach


								</div>
								
							</div>
						</div>
					@include('template_frontend.widget')

					</div>
				</div>
			</div>
		</section>
		<!-- End top-images section -->

		<!-- fresh-section 
			================================================== -->
		<section class="fresh-section on-trend-mode">
			<div class="container">
				<div class="title-section text-center">
					<h1>Postingan Admin</h1>
				</div>
				<div class="fresh-box owl-wrapper">
					
					<div class="owl-carousel" data-num="2">
					@foreach($post_admin as $post_admin)
						<div class="item">
							<div class="news-post article-post">
								<div class="image-holder">
									<img src="{{ $post_admin->gambar }}" alt="">
								</div>
								<a class="text-link" href="{{ route('blog.kategori', $post_admin->kategori->slug) }}">{{ $post_admin->kategori->nama_kategori }}</a>
								<h2><a href="{{ route('blog.isi', $post_admin->slug ) }}">{{ $post_admin->judul }}</a></h2>
								<ul class="post-tags">
									<li>{{ $post_admin->created_at->diffForHumans() }}</li>
									<li>by <a href="{{ route('blog.user', $post_admin->user->slug) }}">{{ $post_admin->user->name }}</a></li>
								</ul>
								{{ $post_admin->deskripsi }}...</p>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</section>
		<!-- End fresh section -->

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
								<li><a href="#" class="active" data-filter="*">All</a></li>
								@foreach($filter_kategori as $hasil)
								<li><a href="#" data-filter=".{{$hasil->nama_kategori }}">{{$hasil->nama_kategori }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>

				<div class="latest-box iso-call">
				@foreach($data as $post_terbaru)
					<div class="item {{$post_terbaru->kategori->nama_kategori }}">
						<div class="news-post article-post">
							<div class="image-holder">
								<img src="{{ $post_terbaru->gambar }}" alt="">
							</div>
							<a class="text-link" href="{{ route('blog.kategori', $post_terbaru->kategori->slug) }}">{{ $post_terbaru->kategori->nama_kategori }}</a>
							<h2><a href="{{ route('blog.isi', $post_terbaru->slug ) }}">{{ $post_terbaru->judul }}</a></h2>
							<ul class="post-tags">
								<li>{{ $post_terbaru->created_at->diffForHumans() }}</li>
								<li>by <a href="{{ route('blog.user', $post_terbaru->user->slug) }}">{{ $post_terbaru->user->name }}</a></li>
							</ul>
							{{ $post_terbaru->deskripsi }}...</p>
						</div>
					</div>

				@endforeach
			
					
				</div>

				<div class="center-button">
					<a class="button-one" href="{{ route('blog.list') }}">Load More</a>
				</div>

			</div>
		</section>
		<!-- End latest section -->
@endsection