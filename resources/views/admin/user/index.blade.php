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
                                    <li class="breadcrumb-item"><a>User</a>
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
                    <h2 class="h6 text-uppercase mb-0">Data User</h2>
                  </div>
                  <div class="card-body">
                  	<a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Tambah</a><br><br>
                    <table id="example1" class="table table table-head-fixed text-nowrap table-bordered table-striped dataTable" style="width:100%" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php 
                          $no = 1; 
                          @endphp
                          @foreach ($user as $result => $hasil)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>
                                @if($hasil->foto)
                                  <img src="{{url('img/user', $hasil->foto)}}" class="img-xs rounded-circle" alt="image" style="margin-right: 10px; width: 40px;" />
                                @else
                                  <img src="{{url('img/user/default.jpg')}}" class="img-xs rounded-circle" alt="image" style="margin-right: 10px; width: 40px;" />

                                @endif

                                {{$hasil->name}}</td>
                              <td style="text-transform: capitalize;">{{ $hasil->level}}</td>
                              <td>{{ $hasil->username}}</td>
                              <td>{{ $hasil->email}}</td>
                              <td>{{ $hasil->created_at}}</td>
                              <td>
                                  <a href="{{ route('user.edit', $hasil->id ) }}" class="btn btn-info btn-sm">Edit
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" id="{{$hasil->id}}">Hapus
                                  </button>
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
            text: "Ingin menghapus data ini!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              if (willDelete) {
                window.location = "user/"+id+"/delete"
              }
              }
          });
        });
    });
  })
</script>
@endsection