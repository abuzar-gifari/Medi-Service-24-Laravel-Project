<div class="main-sidebar">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{ asset('uploads/ad_logo.png') }}" style="width:100%;height:150px; margin-top:-30px;" alt="" srcset="">
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html"></a>
    </div>

    <ul class="sidebar-menu mt-3">

        <li class="active"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

        <!-- Slider -->
        <li class="{{ Request::is('admin/slider/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_slider_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Sliders</span></a></li>

        <!-- Category -->
        <li class="{{ Request::is('admin/category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_category_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Categories</span></a></li>

        <!-- Sub-Category -->
        <li class="{{ Request::is('admin/subcategory/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subcategory_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Sub-Categories</span></a></li>

        <!-- Vendor -->
        <li class="{{ Request::is('admin/vendors') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_vendor_lists_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Vendors</span></a></li>
        
        <!-- Customer -->
        <li class="{{ Request::is('admin/customers') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_customer') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Customers</span></a></li>

        <!-- Delivery Boy -->
        <li class="{{ Request::is('admin/delivery_boys') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_delivery_boy_lists_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Delivery Boys</span></a></li>


        <!-- Orders -->
        <li class="{{ Request::is('admin/order/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_orders') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Orders"><i class="fa fa-cart-plus"></i> <span>Manage Orders</span></a></li>



        <!-- Manage Stock -->
        <li class="{{ Request::is('admin/stock/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_stock_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Stock</span></a></li>


        
        <!-- Product -->
        <li class="nav-item dropdown
        {{Request::is('admin/product/*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"> <i class="fa fa-hotel" aria-hidden="true"></i> <span>Manage Products</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('admin/product/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_product_show') }}"><i class="fas fa-angle-right"></i>Products</a></li>
            </ul>
        </li>


        <!-- Subscribers -->
        <li class="nav-item dropdown {{ Request::is('admin/subscriber/show')||Request::is('admin/subscriber/send-email') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Subscribers</span></a>
            <ul class="dropdown-menu">

                <li class="{{ Request::is('admin/subscriber/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_show') }}"><i class="fa fa-angle-right"></i> All Subscribers </a></li>

                <li class="{{ Request::is('admin/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_send_email') }}"><i class="fa fa-angle-right"></i> Send Email</a></li>
            </ul>
        </li>


        <!-- Faqs -->
        <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_view') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="FAQ"><i class="fa fa-bolt"></i> <span>Manage FAQ</span></a></li>




    </ul>
</aside>
</div>