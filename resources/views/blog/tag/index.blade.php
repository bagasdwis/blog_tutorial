@extends('/template_frontend.content')
	
@section('isi')
<!-- page-banner section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Tag: {{$data->nama_tag}}</h1>
				<span>{{$data->post->where('status',1)->count() }} Postingan</span>
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
							@foreach($data->post()->where('status',1)->paginate(6) as $list_tag)
								<div class="col-md-6">
									<div class="news-post article-post">
										<div class="image-holder">
											<img src="{{asset($list_tag->gambar) }}" alt="">
										</div>
										<a class="text-link" href="{{ route('blog.kategori', $list_tag->kategori->slug) }}">{{$list_tag->kategori->nama_kategori }}</a>
										<h2><a href="{{ route('blog.isi', $list_tag->slug ) }}">{{ $list_tag->judul }}</a></h2>
										<ul class="post-tags">
											<li>{{ $list_tag->created_at->diffForHumans() }}</li>
											<li>{{ $list_tag->komentar->count() }} komentar</li>
											<li>by <a href="{{ route('blog.user', $list_tag->user->slug) }}">{{ $list_tag->user->name }}</a></li>
										</ul>
										<p><?php echo \Illuminate\Support\Str::limit(strip_tags($list_tag->konten), 150, $end='...') ?></p>
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
							@include('template_frontend.pagination', ['paginator' => $data->post()->paginate(6)->appends(Request::except('page'))])
							</ul>
						</div>
					</div>
					@include('template_frontend.widget')
				</div>
			</div>
		</section>
		<!-- End blog section -->
@endsection