<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
            <div id="header-wrap">
                <div class="container clearfix">
                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <div id="logo">
                        <a href="/" class="standard-logo" data-dark-logo="{{ url('data_file/'.$generals->image) }}"><img
                                src="{{ url('data_file/'.$generals->image) }}" alt="Canvas Logo"></a>
                        <a href="/" class="retina-logo" data-dark-logo="{{ url('data_file/'.$generals->image) }}"><img
                                src="{{ url('data_file/'.$generals->image) }}" alt="Canvas Logo"></a>
                    </div>

                    
                    
                    {{-- @if (Auth::user()) --}}
                         
                    {{-- @endif --}}


                    <nav id="primary-menu">
                        <ul>
                            <li class="current"><a href="/"><div>Home</div> </a></li>
                           <li><a href="/cara-order">Cara Order</a></li>
                             <li><a href="/syarat-ketentuan">Syarat & Ketentuan</a></li>
                               <li><a href="/faq">FAQ</a></li>
                                 <li><a href="/blog">Blog</a></li>
                        
                        </ul>
                    @if (Route::has('login'))                      
                            @auth
                                {{-- <div class="top-right links"> --}}
                                    <div id="top-cart" class="dropdown">
                                        <a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                            <a class="dropdown-item tleft" href="/dashboard">Profile</a>
                                            <a class="dropdown-item tleft" href="#">Messages <span
                                                    class="badge badge-pill badge-secondary fright" style="margin-top: 3px;">5</span></a>
                                            <a class="dropdown-item tleft" href="#">Settings</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item tleft" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">Logout <i
                                                    class="icon-signout"></i></a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                {{-- </div> --}}
                            @else
                            <div id="top-cart">
                                <a href="{{ route('login') }}"><i class="icon-user"></i></a>
                                <div class="top-cart-content">
                                    <div class="top-cart-title">
                                        <h4>Login</h4>
                                    </div>                                       
                                </div>
                            </div>
                            @endauth
                    @endif
                        {{-- <div id="top-cart">
                            <a href="{{ route('login') }}"><i class="icon-user"></i></a>
                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <h4>Login</h4>
                                </div>
                              
                            </div>
                        </div> --}}

                        {{-- <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i
                                    class="icon-line-cross"></i></a>
                            <form action="#" method="get">
                                <input type="text" name="q" class="form-control" value=""
                                    placeholder="Type &amp; Hit Enter..">
                            </form>
                        </div> --}}
                    </nav>
                </div>
            </div>
        </header>