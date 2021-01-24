@extends('/template_frontend.content')
	
@section('isi')

<!-- blog section 
			================================================== -->
		<section class="blog-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="single-post">
							<div class="single-post-content">
							@foreach($data as $isi_post)
								<img src="{{asset($isi_post->gambar) }}" alt="">
								<div class="post-content">
									<div class="post-content-text">
										<a class="text-link" href="{{ route('blog.kategori', $isi_post->kategori->slug) }}">{{$isi_post->kategori->nama_kategori }}</a>
										<h1>{{ $isi_post->judul }}</h1>
										<ul class="post-tags">
											<li>{{ $isi_post->created_at->diffForHumans() }}</li>
											<li>by <a href="{{ route('blog.user', $isi_post->user->slug) }}">{{ $isi_post->user->name }}</a></li>
										</ul>
										<p>{!! $isi_post->konten !!}</p>
										<div class="share-tags-box">
											<ul class="tags">Tags : 
												@foreach($isi_post->tag as $tag)
												<li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->nama_tag }}</a></li>
												@endforeach
											</ul>
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
		</section>
		<!-- End blog section -->
@endsection