@php
function active($current_page){
    $url =  Request::segment(2);
    if($current_page == $url){
        echo 'active'; //class name in css
    }
}
@endphp

<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none">
    <a class="navbar-brand mr-lg-5" href="#">
        <img class="navbar-brand-dark" src="{{asset('admin/assets/img/brand/light.svg')}}" alt="Volt logo" /> <img class="navbar-brand-light" src="{{asset('admin/assets/img/brand/dark.svg')}}" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

        <div class="container-fluid bg-soft">
            <div class="row">
                <div class="col-12">

                    <nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
      <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
       
        <div class="collapse-close d-md-none">
            <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse"
                data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                aria-label="Toggle navigation"></a>
        </div>
      </div>
      <ul class="nav flex-column">
        <li class="nav-item  {{ active('dashboard') }} ">
          <a href="{{route('admin_dashboard')}}" class="nav-link">
            <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{ active('banner-list') . active('banner-add') . active('banner-edit') }}">
          <a href="{{route('admin_banners')}}" class="nav-link">
              <span class="sidebar-icon"><span class="far fa-images"></span></span>
              <span>Banners</span>
          </a>
        </li>
          <li class="nav-item {{ active('faq-list') . active('faq-add') . active('faq-edit') }}">
          <a href="{{route('admin_faqs')}}" class="nav-link">
              <span class="sidebar-icon"><span class="far fa-images"></span></span>
              <span>Faqs</span>
          </a>
        </li>
         <li class="nav-item {{ active('order-list') }}">
          <a href="{{route('admin_order_list')}}" class="nav-link">
              <span class="sidebar-icon"><span class="far fa-images"></span></span>
              <span>Orders for Stones</span>
          </a>
        </li>
        <li class="nav-item {{ active('admin_searches_order_list') }}">
          <a href="{{route('admin_searches_order_list')}}" class="nav-link">
              <span class="sidebar-icon"><span class="far fa-images"></span></span>
              <span>Searches Bought</span>
          </a>
        </li>
        <li class="nav-item {{ active('product-list') . active('product-add') . active('product-edit') }} ">
          <a href="{{route('admin_products')}}" class="nav-link">
              <span class="sidebar-icon"></i><span class="fas fa-blog"></span></span>
              <span>Products</span>
          </a>
        </li>
        

<li class="nav-item {{ active('oldside-list') . active('oldside-add') . active('oldside-edit') }} ">
          <a href="{{route('admin_oldside_map')}}" class="nav-link">
              <span class="sidebar-icon"></i><span class="fas fa-blog"></span></span>
              <span>Old Side Map</span>
          </a>
        </li>
        <li class="nav-item {{ active('newside-list') . active('newside-add') . active('newside-edit') }} ">
          <a href="{{route('admin_newside_map')}}" class="nav-link">
              <span class="sidebar-icon"></i><span class="fas fa-blog"></span></span>
              <span>NewSide Map</span>
          </a>
        </li>
       {{--  <li class="nav-item {{ active('testimonial-list') . active('testimonial-add') . active('testimonial-edit') }}">
            <a href="{{route('admin_testimonials')}}" class="nav-link">
                <span class="sidebar-icon"><span class="fas fa-window-restore"></span></span>
                <span>Testimonials</span>
            </a>
        </li>
          <li class="nav-item {{ active('service-list') . active('service-add') . active('service-edit') }}">
              <a href="{{route('admin_services')}}" class="nav-link">
                  <span class="sidebar-icon"><span class="fas fa-clipboard-check"></span></span>
                  <span>Services</span>
              </a>
          </li> --}}
        <li class="nav-item {{ active('user-list') . active('user-add') . active('user-edit') }}">
            <a href="{{route('admin_users')}}" class="nav-link">
                <span class="sidebar-icon"><span class="fas fa-users"></span></span>
                <span>Users</span>
            </a>
        </li>
            <li class="nav-item {{ active('rate-list') . active('rate-add') . active('rate-edit') }}">
            <a href="{{route('admin_rate')}}" class="nav-link">
                <span class="sidebar-icon"><span class="fas fa-users"></span></span>
                <span>Rate For Searches</span>
            </a>
        </li>
        <li class="nav-item {{ active('stone-rate-list') . active('stone-rate-add') . active('stone-rate-edit') }}">
            <a href="{{route('stone_rate')}}" class="nav-link">
                <span class="sidebar-icon"><span class="fas fa-users"></span></span>
                <span>Rate For Stone</span>
            </a>
        </li>
    {{--     <li class="nav-item {{ active('categories-list') . active('categories-add') . active('categories-edit') . active('sub-categories-list') . active('sub-categories-add') . active('sub-categories-edit') . active('products-list') . active('products-add') . active('products-edit') }}">
          <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-pages">
            <span>
              <span class="sidebar-icon"><span class="far fa-file-alt"></span></span>
              Product Details
            </span>
            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
          </span>
          <div class="multi-level collapse " role="list" id="submenu-pages" aria-expanded="false">
              <ul class="flex-column nav">
                  <li class="nav-item {{ active('categories-list') . active('categories-add') . active('categories-edit') }}"><a class="nav-link" href="{{route('admin_categories')}}"><i class="fas fa-bars"></i><span> Categories</span></a></li> --}}
                 {{--  <li class="nav-item {{ active('sub-categories-list') . active('sub-categories-add') . active('sub-categories-edit') }}"><a class="nav-link" href="{{route('admin_sub_categories')}}"><i class="fas fa-bars"></i><span> Sub-Categories</span></a></li>
                  <li class="nav-item {{ active('products-list') . active('products-add') . active('products-edit') }}"><a class="nav-link" href="{{route('admin_products')}}"><i class="fas fa-box-open"></i><span> Products</span></a></li>
              </ul>
          </div>
        </li> --}}

        <li role="separator" class="dropdown-divider mt-4 mb-3 border-black"></li>
        <li class="nav-item">
          <a href="{{route('admin_profiling')}}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <span class="fa fa-user-circle-o text-success"> </span>
            </span>
            <span class="">My Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('logout')}}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon">
              <span class="fas fa-sign-out-alt text-danger"> </span>
            </span>
            <span class="">Logout</span>
          </a>
        </li>
      </ul>
    </div>
</nav>
<main class="content">

    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark pl-0 pr-2 pb-0">
<div class="container-fluid px-0">
<div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
<div class="d-flex">
</div>
<!-- Navbar links -->
<ul class="navbar-nav align-items-center">

<li class="nav-item dropdown">

<div class="dropdown-menu dashboard-dropdown dropdown-menu-right mt-2">
<a class="dropdown-item font-weight-bold" href="{{route('admin_profile')}}"><span class="far fa-user-circle"></span>My Profile</a>
<a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-cog"></span>Settings</a>
<a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-envelope-open-text"></span>Messages</a>
<a class="dropdown-item font-weight-bold" href="#"><span class="fas fa-user-shield"></span>Support</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item font-weight-bold" href="{{route('logout')}}"><span class="fas fa-sign-out-alt text-danger"></span>Logout</a>
</div>
</li>
</ul>
</div>
</div>
</nav>
