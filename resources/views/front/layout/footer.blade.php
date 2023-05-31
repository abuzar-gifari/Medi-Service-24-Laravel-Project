<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Stay home & get your daily <br />
                                needs from our shop
                            </h2>
                            <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest Mart</span></p>
                            <form class="form-subcriber d-flex" method="post" action="{{ route('subscriber_send_email') }}">
                                @csrf
                                <input type="email" name="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img style="width:250px;" src="{{ asset('uploads/One_Medical_Logo.png') }}" alt="logo" /></a>
                            <p class="font-lg text-heading">Awesome Medicine Delivery website </p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            <li><img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                            <li><img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>Email:</strong><span>sale@Nest.com</span></li>
                            <li><img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-clock.svg" alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class=" widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)">About Us</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Terms &amp; Conditions</a></li>
                        <li><a href="javascript:void(0)">Contact Us</a></li>
                        <li><a href="javascript:void(0)">Support Center</a></li>
                        <li><a href="javascript:void(0)">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)">Sign In</a></li>
                        <li><a href="javascript:void(0)">View Cart</a></li>
                        <li><a href="javascript:void(0)">My Wishlist</a></li>
                        <li><a href="javascript:void(0)">Track My Order</a></li>
                        <li><a href="javascript:void(0)">Help Ticket</a></li>
                        <li><a href="javascript:void(0)">Shipping Details</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Latest</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)">Become a Vendor</a></li>
                        <li><a href="javascript:void(0)">Affiliate Program</a></li>
                        <li><a href="javascript:void(0)">Farm Business</a></li>
                        <li><a href="javascript:void(0)">Farm Careers</a></li>
                        <li><a href="javascript:void(0)">Our Suppliers</a></li>
                        <li><a href="javascript:void(0)">Accessibility</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Popular</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)">Antacit</a></li>
                        <li><a href="javascript:void(0)">Fexofenadine</a></li>
                        <li><a href="javascript:void(0)">Viodin 10%</a></li>
                        <li><a href="javascript:void(0)">Finix</a></li>
                        <li><a href="javascript:void(0)">Paracetamol</a></li>
                        <li><a href="javascript:void(0)">Histacin</a></li>
                    </ul>
                </div>
                
            </div>
    </section>
</footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/loading.gif" alt="" />
            </div>
        </div>
    </div>
</div>

@include('front.layout.scripts')