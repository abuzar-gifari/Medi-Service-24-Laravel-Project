<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('vendor_home') }}">Vendor Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('vendor_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class=""><a class="nav-link" href="{{ route('vendor_home') }}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>
            
            <!-- Product -->
            <li class="nav-item dropdown
            {{Request::is('vendor/product/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"> <i class="fa fa" aria-hidden="true"></i> <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('vendor/product/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('vendor_product_show') }}">Products</a></li>
                </ul>
            </li>


            <!-- Manage Stock -->
            <li class="{{ Request::is('vendor/stock/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('vendor_stock_show') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="fa fa-user-plus"></i> <span>Manage Stock</span></a></li>


            <!-- Subscribers -->
            <li class="nav-item dropdown {{ Request::is('vendor/subscriber/show')||Request::is('vendor/subscriber/send-email') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('vendor/subscriber/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('vendor_subscriber_show') }}"><i class="fa fa-angle-right"></i> All Subscribers </a></li>

                    <li class="{{ Request::is('vendor/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('vendor_subscriber_send_email') }}"><i class="fa fa-angle-right"></i> Send Email</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
