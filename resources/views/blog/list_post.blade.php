@extends('/template_frontend.content')
	
@section('isi')

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
											<li>by <a href="{{ route('blog.user', $list_post->user->slug) }}">{{ $list_post->user->name }}</a></li>
										</ul>
										<p>{{ $list_post->deskripsi }}...</p>
									</div>
								</div>
							@endforeach
							</div>
						{{ $data->links() }}
						</div>
					</div>
					@include('template_frontend.widget')
				</div>
			</div>
		</section>
		<!-- End blog section -->
@endsection