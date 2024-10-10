<header id="topnav" class="defaultscroll sticky taglines">
        <div class="container">
            <!-- Logo container-->
            <div>
                <a class="logo" href="/">
                    <img src="{{ url('data_file/'.$generals->image) }}" height="50px" alt="">
                </a>
            </div>
            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    
                    <li><a href="/">Home</a></li>
                    {{-- <li><a href="/blog">Blog</a></li>
                    <li><a href="/partner">Partners</a></li> --}}
                 <li class="has-submenu">
                            <a href="javascript:void(0)">Produk</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                @foreach ($categories as $item)
                                       <li><a href="#">{{ $item->title }}</a></li>
                                @endforeach
                                {{-- <li><a href="index-social-marketing.html">Social Media</a></li>
                                <li><a href="index-online-learning.html">Online Course</a></li>
                                <li><a href="index-coworking.html">Coworking Space</a></li>
                                <li><a href="index-digital-marketing.html">Digital Marketing</a></li>
                                <li><a href="index-job.html">Job & Careers</a></li>
                                <li><a href="index-travel.html">Travel Agency</a></li>
                                <li><a href="index-charity.html">Charity & Helping Hands</a></li>
                                <li><a href="index-cloud-hosting.html">Cloud Hosting</a></li>
                                <li><a href="index-minimal-portfolio.html">Minimal Portfolio</a></li>
                                <li><a href="index-startup-business.html">Startup Business</a></li> --}}
                            </ul>
                        </li>
                    {{-- <ul class="navigation-menu"> --}}
                        {{-- <li><a href="/product">Produk</a></li> --}}
                    {{-- </ul> --}}
                    
                    <li><a href="/contact">Kontak Kami</a></li>
                    <li><a href="/comingsoon"> <i data-feather="shopping-bag" class="fea text-primary"></i></a></li>
                </ul>
                <!--end navigation menu-->

                <ul class="list-unstyled small-tagline d-none mb-0">
                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" data-toggle="modal"
                            data-target="#LoginForm" class="text-dark"><i data-feather="user"
                                class="fea icon-sm"></i></a></li>
                    <li class="list-inline-item mr-2"><a href="{{ $generals->facebook }}" class="text-dark"><i
                                data-feather="facebook" class="fea icon-sm"></i></a></li>
                   
                    <li class="list-inline-item mr-2"><a href="{{ $generals->instagram }}" class="text-dark"><i
                                data-feather="instagram" class="fea icon-sm"></i></a></li>
                    <li class="list-inline-item"><a href="{{ $generals->youtube }}" class="text-dark"><i
                                data-feather="youtube" class="fea icon-sm"></i></a></li>
                </ul>
                <!--end login button-->
            </div>
            <!--end navigation-->
        </div>
        <!--end container-->
    </header>