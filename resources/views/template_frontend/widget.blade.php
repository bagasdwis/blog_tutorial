
					<div class="col-lg-4">
						<div class="sidebar">

							<div class="widget category-widget">
								<h2>Postingan Terbaru</h2>
								<ul class="list-thumb-posts">
									@foreach($terbaru as $baru)
									<li>
										<div class="image-holder"><img src="{{asset($baru->gambar) }}" alt=""></div>
										<div class="list-post-content">
											<a class="text-link" href="{{ route('blog.kategori', $baru->kategori->slug) }}">{{$baru->kategori->nama_kategori }}
											<h2><a href="{{ route('blog.isi', $baru->slug ) }}">{{ $baru->judul }}</a></h2>
											<ul class="post-tags">
												<li>{{ $baru->created_at->diffForHumans() }}</li>
												<li>{{ $baru->komentar->count() }} komentar</li>
											</ul>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
								
							<div class="widget category-widget">
								<h2>Kategori</h2>
								<ul class="category-list">
									<li>
										@foreach($filter_kategori as $hasil)
										<a href="{{ route('blog.kategori', $hasil->slug) }}">
											{{$hasil->nama_kategori }}<span>{{ $hasil->post->where('status',1)->count() }}</span>
										</a>
										@endforeach
									</li>
								</ul>
							</div>

								<div class="single-post">
									<div class="single-post-content">
										<div class="post-content">
											<div class="post-content-text">
												<div class="widget category-widget">
													<h2>Tags</h2>
													<div class="share-tags-box">
														<ul class="tags"> 
															@foreach($filter_tag as $tag)
															<li><a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->nama_tag }}</a></li>
															@endforeach
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>