@extends('user.layout.app')

@section('title')
    Products
@endsection

@section('page-styles')
@endsection

@section('styles')
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

                </div>
            </div>
        </section>
    <!-- services -->

@endsection

@section('page-scripts')
@endsection

@section('scripts')
@endsection