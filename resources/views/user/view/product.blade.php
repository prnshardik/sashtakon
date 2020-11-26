@extends('user.layout.app')

@section('title')
    Products
@endsection

@section('page-styles')
    <link href="{{ asset('frontend/photo-gallery/css/prettyPhoto.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/photo-gallery/css/styles.css') }}" rel="stylesheet" />
@endsection

@section('styles')
    <style>
        .image-block{ display:block;position: relative;}
        .image-block img{border: 1px solid #d5d5d5; border-radius: 4px 4px 4px 4px;background:#FFFFFF;padding:10px;}
        .image-block img:hover{border: 1px solid #A9CF54;box-shadow:0 0 5px #A9CF54;}
        .portfolio-area li{float: left;margin: 0 12px 20px 0;overflow: hidden;width: 245px;padding:5px;}
        .home-portfolio-text{margin-top:10px;}
    </style>
@endsection

@section('content')
	<!-- banner -->
        <div class="banner layer" id="home">
            <div class="container">
                <div class="banner-text">
                    <div class="slider-info text-center">
                        <div class="agileinfo-logo">
                            <h2> {{ _setting('site_title') }} Technology </h2>
                        </div>
                        <h3 class="txt-w3_agile"> Decorating Ideas for your House</h3>
                    </div>
                    <div class="row banner-grids text-center mt-md-5 mt-3">
                        <div class="col-lg-3 col-md-2">
                            <img src="{{ asset('frontend/images/bathing.png') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="col-lg-6 col-md-8 banner-para">
                            <p class="">Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium nulla malesuada sedint. Suspendisse venenatis</p>
                            <a href="#myModal_btn1" data-toggle="modal" data-target="#myModal_btn1">Read More</a>
                        </div>
                        <div class="col-lg-3 col-md-2">
                            <img src="{{ asset('frontend/images/chair.png') }}" class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="thim-click-to-bottom text-center">
                        <div class="rotate">
                            <a href="#about" class="scroll">
                            <i class="fas fa-angle-double-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- banner -->

    <!-- services -->
        <section class="services py-5" id="furniture">
            <div class="container py-lg-5">
                <h3 class="heading mb-5 text-center">Our Furniture</h3>
                <div class="row product-grids">
                    <ul class="portfolio-categ filter">
                        <li class="all active"><a href="#">All</a></li>
                        @if(isset($data) && $data->isNotEmpty())
                            @foreach($data as $row)
                                <li class="cat-item-{{ $row->id }}"><a href="#" title="{{ $row->name }}">{{ $row->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>

                    <ul class="portfolio-area">                    
                        @if(isset($data) && $data->isNotEmpty())
                            @foreach($data as $row)
                                @if(isset($row->products) && $row->products->isNotEmpty())
                                    @foreach($row->products as $pRow)
                                        <li class="portfolio-item2" data-id="id-{{ $pRow->id }}" data-type="cat-item-{{ $row->id }}">
                                            <div>
                                                <span class="image-block">
                                                    <a class="image-zoom" href="{{ $pRow->image }}" rel="prettyPhoto[ gallery ]" title="{{ $pRow->name }}">
                                                        <img width="225" height="140" src="{{ $pRow->image }}" alt="{{ $pRow->name }}" title="{{ $pRow->name }}" />
                                                    </a>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </section>
    <!-- services -->

@endsection

@section('page-scripts')
    <script src="{{ asset('frontend/js/jQuery-1.17.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/photo-gallery/js/jquery.quicksand.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/photo-gallery/js/jquery.easing.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/photo-gallery/js/jquery.prettyPhoto.js') }}" type="text/javascript"></script>   
    <script src="{{ asset('frontend/photo-gallery/js/script.js') }}" type="text/javascript"></script>
@endsection

@section('scripts')
    <script>
        // Clone applications to get a second collection
        var $data = $(".portfolio-area").clone();
    
        //NOTE: Only filter on the main portfolio page, not on the subcategory pages
        $('.portfolio-categ li').click(function(e) {
            $(".filter li").removeClass("active");
            // Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
            var filterClass=$(this).attr('class').split(' ').slice(-1)[0];
    
            if (filterClass == 'all') {
                var $filteredData = $data.find('.portfolio-item2');
            } else {
                var $filteredData = $data.find('.portfolio-item2[data-type=' + filterClass + ']');
            }

            $(".portfolio-area").quicksand($filteredData, {
                duration: 600,
                adjustHeight: 'auto'
            }, function () {
                lightboxPhoto();
            });
            
            $(this).addClass("active");
            
            return false;
        });

        jQuery("a[rel^='prettyPhoto']").prettyPhoto({
            animationSpeed:'fast',
            slideshow:5000,
            theme:'light_rounded',
            show_title:false,
            overlay_gallery: false
        });
    </script>
@endsection