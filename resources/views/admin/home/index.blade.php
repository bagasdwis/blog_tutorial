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
                                    <li class="breadcrumb-item"><a><span class="o-home-1"></span></a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
              @if(auth()->user()->level == 'admin')<br>
            <div class="row">
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                      <h6 class="mb-0">Data Post</h6><span class="text-gray">{{ $tot_post }}</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-violet"><i class="fas fa-receipt"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                      <h6 class="mb-0">Data Kategori</h6><span class="text-gray">{{ $tot_kategori }}</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                      <h6 class="mb-0">Data Tag</h6><span class="text-gray">{{ $tot_tag }}</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-blue"><i class="fa  fa-server"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-red"></div>
                    <div class="text">
                      <h6 class="mb-0">Data User</h6><span class="text-gray">{{ $tot_user }}</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-red"><i class="fas fa-users"></i></div>
                </div>
              </div>
            </div>
            @endif
          </section>
          <section>
            <div class="row mb-4">
              <div class="col-lg-12 mb-4 mb-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0">Data Post Status Hide</h2>
                  </div>
                  <div class="card-body">
                    <table id="example1" class="table table table-head-fixed text-nowrap table-bordered table-striped dataTable" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Daftar Tag</th>
                                <th>Creator</th>
                                <th>Thumbnail</th>
                                <th>Status</th>
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
                              @if($hasil->status == 1)
                              <a href="{{ route('post.status', $hasil->id) }}" class="btn btn-block btn-success btn-sm">Show</a>
                              @else
                              <a href="{{ route('post.status', $hasil->id) }}" class="btn btn-block btn-danger btn-sm">Hide</a>
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('post.show', $hasil->id ) }}" class="btn btn-info btn-sm">Detail</a>
                              <a href="{{ route('post.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
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
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/ubah_status',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
              location.reload();
            }
        });
    })
  })
</script>
@endsection