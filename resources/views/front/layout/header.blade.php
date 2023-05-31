<header class="header-area header-style-1 header-height-2">
   <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
      <div class="container">
         <div class="header-wrap">
            <div class="logo logo-width-1">
               <a href="{{ route('home') }}"><img src="{{ asset('uploads/One_Medical_Logo.png') }}" alt="logo" /></a>
            </div>
            <div class="header-right">
               <img src="{{ asset('uploads/ad-1.png') }}"  style="width:670px;" alt="" srcset="">
               <div class="header-action-right">
                  <div class="header-action-2">
                     <div class="search-location">
                        <form action="#">
                           <select class="select-active">
                              <option>Your Location</option>
                              <option>Alabama</option>
                              <option>Alaska</option>
                              <option>Arizona</option>
                              <option>Delaware</option>
                              <option>Florida</option>
                              <option>Georgia</option>
                              <option>Hawaii</option>
                              <option>Indiana</option>
                              <option>Maryland</option>
                              <option>Nevada</option>
                              <option>New Jersey</option>
                              <option>New Mexico</option>
                              <option>New York</option>
                           </select>
                        </form>
                     </div>
                     <div class="header-action-icon-2">
                        <a href="shop-wishlist.html">
                        <img class="svgInject" alt="Nest" src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-heart.svg" />
                      
                        </a>
                        <a href="{{ route('your_checkout') }}"><span class="lable">Checkout</span></a>
                     </div>
                     <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="shop-cart.html">
                        <img alt="Nest" src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-cart.svg" />
                        
                        </a>
                        <a href="{{ route('your_cart') }}"><span class="lable">Cart</span></a>
                        
                     </div>
                     <div class="header-action-icon-2">
                        <a href="page-account.html">
                        <img class="svgInject" alt="Nest" src="{{ asset('asset_front_ms') }}/assets/imgs/theme/icons/icon-user.svg" />
                        </a>
                        <a href="page-account.html"><span class="lable ml-0">Account</span></a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                           @if (Auth::guard('customer')->user())
                              <li>
                                 <a href="{{ route('my-account-page') }}"><i class="fi fi-rs-user mr-10"></i>
                                    My Account</a>
                              </li>
                              <li>
                                 <a href="{{ route('login-page') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                              </li>
                           @else
                              <ul>
                                 <li>
                                    <a href="{{ route('register-page') }}"><i class="fi fi-rs-location-alt mr-10"></i>Register</a>
                                 </li>
                                 <li>
                                    <a href="{{ route('login-page') }}"><i class="fi fi-rs-sign-out mr-10"></i>Login</a>
                                 </li>
                              </ul>
                           @endif
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @include('front.layout.header_bottom')
</header>