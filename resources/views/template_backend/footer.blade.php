		<footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">MI A1 Tutorial © 2021</p>
              </div>
              <div class="col-md-6 text-center text-md-right text-gray-400">
                <p class="mb-0">Version 1.0.0</p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </footer>

        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- Sweetalert -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/select2/js/select2.full.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('assets/summernote/summernote-bs4.min.js')}}"></script>
    
    <script>
    $(document).ready(function() {
      $("#example1").DataTable( {
        "scrollX": true,
        "pageLength": 5,
        "language": {
              "lengthMenu": 'Tampilkan <select class="custom-select custom-select-sm form-control form-control-sm">'+
              '<option value="5">5</option>'+
              '<option value="10">10</option>'+
              '<option value="20">20</option>'+
              '<option value="30">30</option>'+
              '<option value="40">40</option>'+
              '<option value="50">50</option>'+
              '<option value="-1">All</option>'+
              '</select>',
              "zeroRecords": "Tidak ada data yang ditemukan",
              "info": "",
              "search": "Cari:",
              "infoEmpty": "Tidak ada data yang tersedia",
              "infoFiltered": "(difilter dari _MAX_ total data)",
              "paginate": {
              sNext: '<i class="fa fa-angle-right"></i>',
              sPrevious: '<i class="fa fa-angle-left"></i>',
              sFirst: '<i class="fa fa-angle-right"></i>',
              sLast: '<i class="fa fa-angle-left"></i>'
            }
          }
      });
    });
  </script>
  <script>
  $(function () {

    $(document).ready( function () {
        // $('.sidebar').click(function(e){
        //   $('.preloader').fadeIn();
        // })

        var flash = "{{ Session::has('sukses') }}";
        if(flash){
            var pesan = "{{ Session::get('sukses') }}"
            swal("Sukses", pesan, "success");
        }
 
        var gagal = "{{ Session::has('gagal') }}";
        if(gagal){
            var pesan = "{{ Session::get('gagal') }}"
            swal("Error", pesan, "error");
        }
    });
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    $(".placeholder-multiple").select2({
    placeholder: "Pilih Tag"
});
  })
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
        placeholder: 'Silahkan isi konten di sini',
        tabsize: 2,
        height: 200,
        codemirror: { 
          theme: 'monokai'
        }
    });
  })
</script>
<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        });
    </script>
    
    @yield('footer')

  </body>
</html>