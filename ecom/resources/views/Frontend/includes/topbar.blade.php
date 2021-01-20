<div class="top-bar animate-dropdown">
    <div class="container">
        <div class="header-top-inner">


            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                            data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">INR</a></li>
                            <li><a href="#">GBP</a></li>
                        </ul>
                    </li>

                    @if(Route::has('login'))
                    @auth
                    @if(Auth::user()->userType === 'USER')
                    <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                            data-toggle="dropdown"><span class="value">Welcome, {{ Auth::user()->name }} </span><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.profile') }}">Profile</a></li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </ul>
                    </li>
                    @elseif(Auth::user()->userType === 'ADMIN')
                    <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                            data-toggle="dropdown"><span class="value">Welcome, {{ Auth::user()->name }} </span><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>

                            </form>
                            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="icon fa fa-lock"></i>Register</a></li>
                    @endif
                    @else
                    <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="icon fa fa-lock"></i>Register</a></li>
                    @endif
                    @endif


                </ul>
                <!-- /.list-unstyled -->
            </div>
            <!-- /.cnt-cart -->
            <div class="cnt-account">
                <ul class="list-unstyled">
                    <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                    <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                    <li><a href="{{ route('cart.show') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                    <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>

                </ul>
            </div>
            <!-- /.cnt-account -->
            <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
</div>