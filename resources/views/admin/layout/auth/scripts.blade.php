<!-- CORE PLUGINS-->
<script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- CORE SCRIPTS-->
<script src="{{ asset('backend/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>

@yield('page-scripts')

@yield('scripts')