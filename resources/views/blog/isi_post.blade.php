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
								<img src="{{asset($data->gambar) }}" alt="">
								<div class="post-content">
									<div class="post-content-text">
										<a class="text-link" href="{{ route('blog.kategori', $data->kategori->slug) }}">{{$data->kategori->nama_kategori }}</a>
										<h1>{{ $data->judul }}</h1>
										<ul class="post-tags">
											<li>{{ $data->created_at->diffForHumans() }}</li>
											<li>{{ $data->komentar->count() }} komentar</li>
											<li>by <a href="{{ route('blog.user', $data->user->slug) }}">{{ $data->user->name }}</a></li>
										</ul>
										<p>{!! $data->konten !!}</p>
										<div class="share-tags-box">
											<ul class="tags">Tags : 
												@foreach($data->tag as $tag)
												<li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->nama_tag }}</a></li>
												@endforeach
											</ul>
										</div>
									</div>	
								</div>
								<div class="prev-next-box">
									 @if($prev)
									<div class="prev-box">
										<a class="text-link" href="{{ route('blog.isi', ['slug' => $prev->slug ]) }}"><i class="fa fa-angle-left"></i> Postingan Sebelumnya</a>
									</div>
									@endif

						            @if($next)
									<div class="next-box">
										<a class="text-link next-link" href="{{ route('blog.isi', ['slug' => $next->slug ]) }}">Postingan Selanjutnya <i class="fa fa-angle-right"></i></a>
									</div>
									@endif
								</div>
								<div class="related-box">
									<h2>Postingan Terkait</h2>
									<div class="row">
									@foreach($artikelterkait as $terkait)
										<div class="col-lg-4 col-md-4">
											<div class="news-post standard-post text-left">
												<div class="image-holder">
													<a href="single-post.html"><img src="{{asset($terkait->gambar) }}" alt=""></a>
												</div>
												<a class="text-link" href="{{ route('blog.kategori', $terkait->kategori->slug) }}">{{$terkait->kategori->nama_kategori }}</a>
												<h2><a href="{{ route('blog.isi', $terkait->slug ) }}">{{ $terkait->judul }}</a></h2>
												<ul class="post-tags">
													<li>by <a href="{{ route('blog.user', $terkait->user->slug) }}">{{ $terkait->user->name }}</a></li>
													<li>{{ $terkait->created_at->diffForHumans() }}</li>
												</ul>
											</div>
										</div>
									@endforeach
									</div>
								</div>

								<!-- comments -->
							<div class="comments">
								<h2 class="comments-title">
									{{ $data->komentar->count() }} Komentar
								</h2>
								<ul class="comments__list">
								@foreach($data->komentar as $komen)
									<li class="comments__list-item">
										@if($komen->user->foto)
		                                  <img src="{{url('img/user', $komen->user->foto)}}" class="comments__list-item-image" />
		                                @else
		                                  <img src="{{url('img/user/default.jpg')}}" class="comments__list-item-image" />

		                                @endif
										<div class="comments__list-item-content">
											<h3 class="comments__list-item-title">
												{{ $komen->user->name }}
											</h3>
											<span class="comments__list-item-date">
												{{ $komen->created_at->diffForHumans() }}
											</span>
											<a class="comments__list-item-reply" href="javascript:void(0)" onclick="balasKomentar({{ $komen->id }}, '{{ $komen->isi }}')">
												<i class="la la-mail-forward"></i>
												Balas
											</a>
											<p class="comments__list-item-description">
												{{ $komen->isi }}
											</p>
											@foreach ($komen->child as $val) 
		                                        <div class="comments__list-item-content">
		                                        @if($val->user->foto)
				                                  <img src="{{url('img/user', $val->user->foto)}}" class="comments__list-item-image" />
				                                @else
				                                  <img src="{{url('img/user/default.jpg')}}" class="comments__list-item-image" />

				                                @endif
												<div class="comments__list-item-content">
													<h3 class="comments__list-item-title">
														{{ $val->user->name }}
													</h3>
													<span class="comments__list-item-date">
														{{ $val->created_at->diffForHumans() }}
													</span>
													<p class="comments__list-item-description">
														{{ $val->isi }}
													</p>
		                                        </div>
		                                    @endforeach
										</div>
									</li>
								@endforeach
								</ul>
							</div>
							<!-- end comments -->

							<!-- Contact form module -->
							<form action="{{ route('komentar.create', $data->id ) }}" method="POST" class="contact-form">
								@csrf
								<input type="hidden" name="id" value="{{ $data->id }}" class="form-control">
                                <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                                <div class="form-group" style="display: none" id="formReplyComment">
                                        <h2 class="contact-form__title">Balas Komentar</h2>
                                        <input type="text" id="replyComment" class="form-control" readonly>
                                    </div>
								<h2 class="contact-form__title">
									Tulis Komentar
								</h2>
								<textarea class="contact-form__textarea" name="isi" id="comment" placeholder="Tulis komentar"></textarea>
								<input class="contact-form__submit" type="submit" value="Kirim Komentar" />
							</form>
							<!-- End Contact form module -->
							</div>
						</div>
					</div>
					@include('template_frontend.widget')
				</div>
			</div>
		</section>
		<!-- End blog section -->
@endsection

@section('footer')
<script>
    function balasKomentar(id, judul) {
        $('#formReplyComment').show();
        $('#parent_id').val(id)
        $('#replyComment').val(judul)
    }
</script>
@endsection