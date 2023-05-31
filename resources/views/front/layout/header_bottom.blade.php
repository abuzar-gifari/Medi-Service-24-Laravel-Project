<div class="header-bottom header-bottom-bg-color sticky-bar">
   <div class="container">
      <div class="header-wrap header-space-between position-relative">
         <div class="logo logo-width-1 d-block d-lg-none">
            <a href="index.html"><img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/logo.svg" alt="logo" /></a>
         </div>
         <div class="header-nav d-none d-lg-flex">
            <div class="main-categori-wrap d-none d-lg-block">
               <a class="categories-button-active" href="#">
               <span class="fi-rs-apps"></span>   All Categories
               <i class="fi-rs-angle-down"></i>
               </a>
               <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                  <div class="d-flex categori-dropdown-inner">
                     @php
                        $categories = \App\Models\Category::get();
                     @endphp
                     
                     <ul>
                        @foreach ($categories as $category)
                        @if ($loop->iteration > 5)
                           @break
                        @endif
                        <li>
                           <a href="shop-grid-right.html"> <img src="{{ asset('uploads/'.$category->photo) }}" alt="" />{{ $category->name }}</a>
                        </li>
                        @endforeach
                     </ul>
                
                     
                     <ul class="end">
                        @foreach ($categories as $category)
                        @if ($loop->iteration < 6)
                           @continue
                        @endif
                        <li>
                           <a href="shop-grid-right.html"> <img src="{{ asset('uploads/'.$category->photo) }}" alt="" />{{ $category->name }}</a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
               <nav>
                  <ul>
                     <li>
                        <a class="active" href="{{ route('home') }}">Home  </a>
                     </li>
                     <li>
                        <a href="{{ route('about-us-page') }}">About Us</a>
                     </li>
                     <li>
                        <a href="{{ route('contact-page') }}">Contact</a>
                     </li>
                     <li>
                        <a href="{{ route('privacy-policy-page') }}">Privacy Policy</a>
                     </li>
                     <li>
                        <a href="#">Vendors <i class="fi-rs-angle-down"></i></a>
                        <ul class="sub-menu">
                           <li><a href="{{ route('vendor_login') }}">Login</a></li>
                           <li><a href="{{ route('vendor_signup') }}">Register</a></li>
                           <li><a href="{{ route('all_vendor_list') }}">Lists</a></li>
                        </ul>
                     </li>
                     <li class="position-static">
                        <a href="#">Sub-Categories <i class="fi-rs-angle-down"></i></a>
                        <ul class="mega-menu">
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','1')->get();
                              @endphp
                              <a class="menu-title" href="#">Cannabis</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','2')->get();
                              @endphp
                              <a class="menu-title" href="#">Depressants</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','3')->get();
                              @endphp
                              <a class="menu-title" href="#">Opioids</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','4')->get();
                              @endphp
                              <a class="menu-title" href="#">Steroids</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','5')->get();
                              @endphp
                              <a class="menu-title" href="#">Hallucinogen</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','6')->get();
                              @endphp
                              <a class="menu-title" href="#">Benzodia</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','7')->get();
                              @endphp
                              <a class="menu-title" href="#">Capsule</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           <li class="sub-mega-menu sub-mega-menu-width-21">
                              @php
                                 $subcategories = \App\Models\SubCategory::where('category_id','=','8')->get();
                              @endphp
                              <a class="menu-title" href="#">Steroids</a>
                              <ul>
                                 @foreach ($subcategories as $subcategory)
                                    <li><a href="">{{ $subcategory->name }}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#">More Pages <i class="fi-rs-angle-down"></i></a>
                        <ul class="sub-menu">
                           @if (Auth::guard('customer')->user())
                           <li><a href="{{ route('my-account-page') }}">My Account</a></li>
                           @endif
                           <li><a href="{{ route('login-page') }}">Login</a></li>
                           <li><a href="{{ route('register-page') }}">Register</a></li>
                           <li><a href="{{ route('vendor_signup') }}">Become a Vendor</a></li>
                           <li><a href="{{ route('delivery_boy_signup') }}">Register as a Delivery Boy</a></li>
                        </ul>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
         <div class="hotline d-none d-lg-flex">
            <img src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-headphone.svg" alt="hotline" />
            <p>1900 - 888<span>24/7 Support Center</span></p>
         </div>
         <div class="header-action-icon-2 d-block d-lg-none">
            <div class="burger-icon burger-icon-white">
               <span class="burger-icon-top"></span>
               <span class="burger-icon-mid"></span>
               <span class="burger-icon-bottom"></span>
            </div>
         </div>
      </div>
   </div>
</div>