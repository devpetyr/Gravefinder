<header id="header">
    {{--   @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)

                        <li><span class="text-white">{{ $error }}</span></li>
                    @endforeach
                </ul>
            </div>
        @endif
       @if(Session::has('success'))
    <p class="alert
    {{ Session::get('alert-class', 'alert-info') }}">{{Session::get('success') }}</p>
    @endif
     @if(Session::has('error'))
    <p class="alert
    {{ Session::get('alert-class', 'alert-danger') }}">{{Session::get('error') }}</p>
    @endif --}}
    <div class="container">
        <div class="row">


            @if(Auth::id() =='')
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <div class="Item">
                        <a href="{{route('login')}}"
                        ><i class="fa fa-sign-in"></i>
                            <span>Login</span>
                            <div class="clearfix"></div>
                        </a>
                    </div>

                </div>
            @endif
            @if(Auth::id() =='')
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <div class="Item">
                        <a href="{{route('register')}}"
                        ><i class="fa fa-sign-in"></i>
                            <span>Register</span>
                            <div class="clearfix"></div>
                        </a>
                    </div>

                </div>
            @endif
            @if(Auth::id() != '')
                <div class="col-md-3 col-xs-6 col-sm-3">
                    <div class="Item">
                        <a href="{{route('logout')}}"
                        ><i class="fa fa-sign-in"></i>
                            <span>Logout</span>
                            <div class="clearfix"></div>
                        </a>
                    </div>

                </div>
            @endif
            @if((Auth::check() && Auth::user()->user_role) == 1)
                @if(isset(Helper::searches_left()->search_left))
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="Item">
                            <a href="{{route('search')}}">
                                <i class="fa fa-heart"></i>
                                <span>Search Left: {{Helper::searches_left()->search_left}}</span>
                                <div class="clearfix"></div>
                            </a>
                        </div>

                    </div>
                @endif
            @endif
            <div class="col-md-3 col-xs-6 col-sm-3">
              @if(Auth::id() !='')
                <div class="Item">
                  <a href="{{route('cart')}}"
                  ><i class="fa-solid fa-cart-shopping"></i>
                    <span id="cart_count">{{session('cart') != '' ?count(session('cart')):'0'}} Item</span>
                    <div class="clearfix"></div>

                  </a>
                </div>
              @endif
            </div>
            <div class="col-md-3 col-xs-6 col-sm-3 ">
                <div class="sidenav" id="mySidenav">
                    <a class="closebtn" href="javascript:void(0)" onclick="closeNav()"
                    >&times;</a
                    >
                </div>
                <div class="mobilecontainer">
              <span
                      class="pull-right"
                      onclick="openNav()"
                      style="font-size: 30px; cursor: pointer"
              >&#9776;</span
              >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="main-navigate d-none d-sm-none d-md-none d-xs-none">
                    <div class="navigation" id="navbar">
                        <ul class="navbar-set">
                            <li class="active"><a href="{{route('welcome')}}">Grave Finder At St. Stans</a></li>
                            <li><a href="{{route('search')}}">Search</a></li>
                            <li><a href="{{route('about_us')}}">About</a></li>
                            <li><a href="{{route('faqs')}}">FAQs</a></li>
                            <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                            <li><a href="{{route('new_map')}}">Maps of St Stanislaus New Side</a></li>
                            <li><a href="{{route('old_maps')}}">Maps of St Stanislaus Old Side Overview</a></li>
                            @if(auth()->check())
                                <li><a href="{{route('user_profile')}}">My Profile</a></li>
                                <li><a href="{{route('my_orders')}}">My Orders</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    