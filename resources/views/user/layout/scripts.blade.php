    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <script src="{{ asset('frontend/js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>

    <script src="{{ asset('frontend/js/responsiveslides.min.js') }}"></script>

    <script>
        $(function () {
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>

	<script src="{{ asset('frontend/js/smoothscroll.js') }}"></script>

    <script src="{{ asset('frontend/js/move-top.js') }}"></script>
    <script src="{{ asset('frontend/js/easing.js') }}"></script>
    
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>

    <script src="{{ asset('frontend/js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-validation/additional-methods.js') }}"></script>

    <script src="{{ asset('frontend/js/datatable/datatable.min.js') }}"></script>

    <script src="{{ asset('frontend/js/toastr.js') }}" type="text/javascript"></script>
    
    <script>
        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    </script>

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