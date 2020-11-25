@extends('user.layout.app')

@section('title')
    index
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

    <!-- banner bottom -->
        <section class="banner-bottom py-5" id="about">
            <div class="container py-md-5">
                <div class="row bottom-grids text-center">
                    <div class="col-md-4 bottom-grid">
                        <span class="fab clr1 fa-accusoft"></span>
                        <p class="number">1</p>
                        <h4>Interior Design</h4>
                        <p class="mt-4">Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium nulla malesuada sedint.
                        Suspendisse venenatis</p>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-5 bottom-grid">
                        <span class="fab clr2 fa-android"></span>
                        <p class="number">2</p>
                        <h4>Quality Material</h4>
                        <p class="mt-4">Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium nulla malesuada sedint.
                        Suspendisse venenatis</p>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-5 bottom-grid">
                        <span class="fab clr3 fa-audible"></span>
                        <p class="number">3</p>
                        <h4>Home Furniture</h4>
                        <p class="mt-4">Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium nulla malesuada sedint.
                        Suspendisse venenatis</p>
                    </div>
                    <span class="border-line"></span>
                </div>
            </div>
        </section>
    <!-- banner bottom -->

    <!-- slider -->
        <section class="slider">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 slider-left-img p-0">
                        <img src="{{ asset('frontend/images/slider.jpg') }}" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6">
                        <div class="callbacks_container">
                            <ul class="rslides" id="slider3">
                                <li>
                                    <div class="testi-pos">
                                        <h4>Interior Technology Comes With</h4>
                                    </div>
                                    <div class="testi-agile">
                                        <p>
                                            Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla
                                            quis lorem ut libero malesuada feugiat.Nulla quis lorem ut libero malesuada feugiat.
                                            Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit utpretium nulla malesuada sedint. Suspendisse venenatis.
                                        </p>
                                        <a href="#">Read More</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="testi-pos">
                                        <h4>Quality Management Design Is</h4>
                                    </div>
                                    <div class="testi-agile">
                                        <p>
                                            Donec rutrum congue leo eget consectetur sed, convallis at tellus. Nulla quis
                                            lorem ut libero malesuada feugiat.Nulla quis lorem ut libero malesuada feugiat. Donec
                                            rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit utpretium nulla malesuada sedint. Suspendisse venenatis.
                                        </p>
                                        <a href="#">Read More</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="testi-pos">
                                        <h4>Interior Decoration design for</h4>
                                    </div>
                                    <div class="testi-agile">
                                        <p>
                                            Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla
                                            quis lorem ut libero malesuada feugiat.Nulla quis lorem ut libero malesuada feugiat.
                                            Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit utpretium nulla malesuada sedint. Suspendisse venenatis.
                                        </p>
                                        <a href="#">Read More</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- slider -->

    <!-- services -->
        <section class="services py-5" id="furniture">
            <div class="container py-lg-5">
                <h3 class="heading mb-5 text-center">Our Furniture</h3>
                <div class="row product-grids">
                    <!-- <div class="col-lg-8">
                        <div class="row bg-light p-md-5 p-3">
                            <div class="col-md-4 p-0">
                                <img src="{{ asset('frontend/images/s2.png') }}" class="mt-4 img-fluid" alt="" />
                            </div>
                            <div class="col-md-8 pl-4">
                                <h6>Featured Product</h6>
                                <h4 class="p1">Product Name</h4>
                                <h5>$210</h5>
                                <p class="mt-4">Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium nulla malesuada sedint.
                                Suspendisse venenatis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
                        <div class="bg-light text-center">
                            <img src="{{ asset('frontend/images/s1.png') }}" class="img-fluid" alt="" />
                            <h4 class="mb-1">Product Name</h4>
                            <h5 class="pb-4">$210</h5>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="bg-light text-center">
                            <img src="{{ asset('frontend/images/s4.png') }}" class="img-fluid" alt="" />
                            <h4 class="mb-1">Product Name</h4>
                            <h5 class="pb-3">$210</h5>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="bg-light text-center">
                            <img src="{{ asset('frontend/images/s3.png') }}" class="img-fluid" alt="" />
                            <h4 class="mb-1">Product Name</h4>
                            <h5 class="pb-3">$210</h5>
                        </div>
                    </div> -->
                    @if(isset($data) && !empty($data))
                        @foreach($data as $row)
                            <div class="col-lg-4 col-md-6 mt-5">
                                <div class="bg-light text-center">
                                    <img src="{{ $row->image ?? '' }}" class="img-fluid" alt="" />
                                    <h4 class="mb-1">{{ $row->name ?? '' }}</h4>
                                    <h6 class="pb-3">{{ $row->sort_description ?? '' }}</h6>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-4 col-md-6 mt-5">
                            <div class="bg-light text-center">
                                <img src="{{ asset('frontend/images/s5.png') }}" class="img-fluid" alt="" />
                                <h4 class="mb-1">Product Name</h4>
                                <h5 class="pb-3">$210</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    <!-- services -->

    <!-- map -->
        <section class="agileits-w3layouts-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.9503398796587!2d-73.9940307!3d40.719109700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1441710758555" allowfullscreen=""></iframe>
        </section>
    <!-- map -->

    <!-- contact -->
        <section class="contact py-5" id="contact">
            <div class="container py-md-3">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="mb-4">Get in touch</h3>
                        <p class="mb-4">Donec malesuada ex sit amet pretium sid ornare. Nulla congue scelerisque tellus, utpretium. Mauris suscipit nisi.</p>
                        <h3 class="mb-4">Subscribe</h3>
                        <form action="{{ route('user.subscribe') }}" method="post" class="subscribe">
                            @csrf
                            <input type="email" name="email" id="email" placeholder="Enter your email..." required="">
                            @error('email')
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                    <div class="col-lg-8 agileinfo_mail_grid_right mt-lg-0 mt-5">
                        <form action="{{ route('user.contact_us') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 wthree_contact_left_grid pr-md-0">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ @old('name') }}" required="">
                                        @error('name')
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ @old('email') }}" required="">
                                        @error('email')
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 wthree_contact_left_grid">
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="{{ @old('phone') }}" required="">
                                        @error('phone')
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" value="{{ @old('subject') }}" required="">
                                        @error('subject')
                                            <span class="invalid-feedback" style="display: block;">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="Message" class="form-control" required="">{{ @old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="submit-buttons text-center">
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!-- contact -->
@endsection

@section('page-scripts')
@endsection

@section('scripts')
@endsection