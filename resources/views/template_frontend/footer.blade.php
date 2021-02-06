	<!-- footer 
			================================================== -->
		<footer>
			<div class="container">

				<h1>MI A1 Tutorial</h1>
				<p class="copyright-line">© Copyright 2021</p>

			</div>

		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->

	<div class="preloader">
		<img alt="" src="{{ asset('frontend/assets/images/loader.gif') }}">
	</div>
	
	<script src="{{ asset('frontend/assets/js/mite-plugins.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/popper.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
	 <!-- Sweetalert -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
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
	@yield('footer')
</body>
</html>