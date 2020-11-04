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

	<script src="{{ asset('frontend/js/smoothscroll.js') }}"></script><!-- Smooth scrolling -->

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
    <script>
        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    </script>