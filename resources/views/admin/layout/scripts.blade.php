<!-- CORE PLUGINS-->
<script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

<!-- PAGE LEVEL PLUGINS-->
<script src="{{ asset('backend/vendors/chart.js/dist/Chart.min.js') }}" type="text/javas<!-- cript"></script>
<script src="{{ asset('backend/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}" type="text/javascript"></script> -->

<!-- CORE SCRIPTS-->
<script src="{{ asset('backend/js/app.min.js') }}" type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS-->
<!-- <script src="{{ asset('backend/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script> -->

<script src="{{ asset('backend/js/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('backend/js/jquery-validation/additional-methods.js') }}"></script>

<script src="{{ asset('backend/js/datatable/datatable.min.js') }}"></script>
<script src="{{ asset('backend/js/toastr.js') }}" type="text/javascript"></script>

<script>
	toastr.options = {
	    "closeButton": true,
	    "debug": false,
	    "newestOnTop": true,
	    "progressBar": false,
	    "positionClass": "toast-top-right",
	    "preventDuplicates": true,
	    "onclick": null,
	    "showDuration": "300",
	    "hideDuration": "1000",
	    "timeOut": "5000",
	    "extendedTimeOut": "1000",
	    "showEasing": "swing",
	    "hideEasing": "linear",
	    "showMethod": "fadeIn",
	    "hideMethod": "fadeOut"
	}
</script>

<script>
	var success = "{{ session()->has('success') ? session()->get('success') : '' }}";
	var error = "{{ session()->has('error') ? session()->get('error') : '' }}";
	
	if (success.length > 0) {
	    toastr.success(success, 'Success');
	}
	
	if (error.length > 0) {
	    toastr.error(error, 'Error');
	}
</script>
	
@yield('page-scripts')

@yield('scripts')