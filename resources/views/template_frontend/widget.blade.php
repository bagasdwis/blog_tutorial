
					<div class="col-lg-4">
						<div class="sidebar">

							<div class="widget category-widget">
								<h2>Tags</h2>
								<ul class="category-list">
									<li>
										@foreach($filter_tag as $tag)
										<a href="{{ route('blog.tag', $tag->slug) }}">
											{{$tag->nama_tag }}<span>{{ $tag->post->count() }}</span>
										</a>
										@endforeach
									</li>
								</ul>
							</div>

							<div class="widget category-widget">
								<h2>Kategori</h2>
								<ul class="category-list">
									<li>
										@foreach($filter_kategori as $hasil)
										<a href="{{ route('blog.kategori', $hasil->slug) }}">
											{{$hasil->nama_kategori }}<span>{{ $hasil->post->count() }}</span>
										</a>
										@endforeach
									</li>
								</ul>
							</div>
							

						</div>
					</div>