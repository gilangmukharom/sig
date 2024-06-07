<div class="it-header-transparent">
    <div id="header-sticky" class="it-header-2-area it-header-3-style it-header-5-style">
        <div class="container-fluid">
            <div class="it-header-2-plr">
                <div class="it-header p-flex">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-6">
                            <div class="navbar-nav">
                                <a class="navbar-logo" href="/"><img src="{{asset('assets/img/logo/sig2.png')}}"></a>
                            </div>
                        </div>
                        <div class="col-xl-6 d-none d-xl-block">
                            <div class="it-header-2-main-menu">
                                <nav class="it-menu-content">
                                    <ul>
                                        <li><a href="/">HOME</a></li>
                                        <li><a href="{{route('about')}}">ABOUT US</a></li>
                                        <li>
                                            <a href="#">CORE SIG</a>
                                        </li>
                                        <li>
                                            <a href="#">NEWS</a>
                                        </li>
                                       <li class="has-dropdown">
                                                <a href="#">SIG INSTITUTE</a>
                                                <ul class="it-submenu submenu">
                                                    <li><a href="{{route('siginstitute')}}">Sertifikasi</a></li>
                                                    <li><a href="{{route('specialclass') }}">Special Class</a></li>
                                                    <li>
                                                </ul>
                                            </li>
                                        @if(Route::has('login'))
                                        @auth
                                        <li class="has-dropdown">
                                            <a href="#">My Account</a>
                                            <ul class="it-submenu submenu">
                                                    @if(Auth::user()->utype == 'ADM')
                                                     <li><a href="{{route('admin.dashboard')}}">Manage Admin</a></li>
                                                     @endif
                                                <li><a href="{{ route('profile.show') }}">Manage Account</a></li>
                                                <li><a href="{{ route('myorder') }}">My Invoice</a></li>
                                                <li><a href="#">Contact Us</a></li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button type="submit" class="it-btn">Logout</button>
                                                    </form>
                                                    </li>
                                                   
                                            </ul>
                                        </li>
                                        @else
                                        <li><a href="#">CONTACT</a></li>
                                        @endauth
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        @if(Route::has('login'))
                        @auth
                        <div class="col-xl-3 col-6">
                            <div class="it-header-2-right d-flex align-items-center justify-content-end">
                                @if(Session('cart') >= 1)
                                <div class="it-header-2-icon">
                                    <a href="{{route('cart')}}">
                                       <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                    </a>
                                </div>
                                @endif
                                <div class="it-header-2-button d-none d-md-block">
                                    <a class="it-btn" href="#">
                                        <span>
                                            {{Auth::user()->name}}
                                        </span>
                                    </a>
                                </div>
                                <div class="it-header-2-bar d-xl-none">
                                    <button class="it-menu-bar"><i class="fa-solid fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-xl-3 col-6">
                            <div class="it-header-2-right d-flex align-items-center justify-content-end">
                                <div class="it-header-2-button d-none d-md-block">
                                    <a class="it-btn" href="{{route('login')}}">
                                        <i class="fas fa-user" style="margin-right:10px"></i>
                                        <span>
                                            Login
                                        </span>
                                      
                                    </a>
                                </div>
                                <div class="it-header-2-bar d-xl-none">
                                    <button class="it-menu-bar"><i class="fa-solid fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>