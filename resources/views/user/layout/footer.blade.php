    <footer class="py-5 bg-light">
        <div class="container py-md-3">
            <div class="row footer-grids">
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-4">Contatc Us</h4>
                    <p> 
                        <span class="fas mr-2 fa-map-marker"></span> 
                        1234 block, Charlotte, North Carolina, United States
                    </p>
                    <p class="my-2">
                        <span class="fas mr-2 fa-envelope-open"></span> 
                        <!-- <a href="mailto:info@example.com">info@example.com</a> -->
                        <a href="#">info@sashtakon.com</a>
                    </p>
                    <p>
                        <span class="fas mr-2 fa-phone-volume"></span> 
                        +91 8000080272
                    </p>
                </div>
                <div class="col-lg-3 mt-md-0 mt-5 col-md-6">
                    <h4 class="mb-4">Company links</h4>
                    <p>
                        <a href="#">Terms and Conditions</a>
                    </p>
                    <p>
                        <a href="#">Privacy Policy</a>
                    </p>
                    <p>
                        <a href="#">License Aggrement</a>
                    </p>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 brands">
                    <h4 class="mb-4">Our Partners</h4>
                    <ul>
                        <li>
                            <img src="{{ asset('frontend/images/brand1.png') }}" class="img-fluid" alt="" />
                        </li>
                        <li>
                            <img src="{{ asset('frontend/images/brand2.png') }}" class="img-fluid" alt="" />
                        </li>
                        <li>
                            <img src="{{ asset('frontend/images/brand3.png') }}" class="img-fluid" alt="" />
                        </li>
                        <li>
                            <img src="{{ asset('frontend/images/brand4.png') }}" class="img-fluid" alt="" />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-5 pt-4 copyright">
                <p class="">{{ _footer_text() }} | Design and developed by
                <a href="http://www.cypherocean.com" taget="_blank"> Cypher Ocean.</a>
            </p>
            </div>
        </div>
    </footer>