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
                                    <li class="breadcrumb-item"><a>Sampah Post</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <section>
            <div class="row mb-4">
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Data Sampah Post</h2>
                  </div>
                  <div class="card-body">
                    <table id="example1" class="table table table-head-fixed text-nowrap table-bordered table-striped dataTable" style="width:100%" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Daftar Tag</th>
                                <th>Creator</th>
                                <th>Thumbnail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php $no = 1; 
                        	@endphp
                          @foreach ($post as $result => $hasil)
            							<tr>
            								<td>{{ $result+1 }}</td>
                            <td>{{ $hasil->judul }}</td>
                            <td>{{ $hasil->kategori->nama_kategori }}</td>
                            <td>
                              @foreach($hasil->tag as $tag)
                                <span class="badge badge-pill badge-secondary">{{ $tag->nama_tag }}</span>
                              @endforeach   
                            </td>
                            <td>{{$hasil->user->name }}</td>
                            <td><img src="{{ asset( $hasil->gambar ) }}" class="img-fluid" style="width:100px"></td>
            				<td>
            					<a href="{{ route('post.restore_sampah', $hasil->id )}}" class="btn btn-primary btn-sm">Kembalikan</a>
            					<button class="btn btn-danger btn-sm delete" id="{{$hasil->id}}">Hapus</button>
            				</td>
            			</tr>
            			@endforeach
	                    </tbody>
	                </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection

@section('footer')
  <script>
  $(function () {

    $(document).ready( function () {
        // btn hapus di klik
        $('.delete').click(function(){
            var id = $(this).attr('id');
            swal({
            title: "Yakin?",
            text: "Ingin menghapus data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              if (willDelete) {
                window.location = "hapus_permanen/"+id
              }
              }
          });
        });
    });
  })
</script>
@endsection