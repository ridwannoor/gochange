  <header id="header" class="full-header">
      <div id="header-wrap">
          <div class="container clearfix">
              <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

              <div id="logo">
                  <a href="/" class="standard-logo" data-dark-logo="{{ url('data_file/'.$generals->image) }}"><img
                          src="{{ url('data_file/'.$generals->image) }}" alt="Canvas Logo"></a>
                  <a href="/" class="retina-logo" data-dark-logo="{{ url('data_file/'.$generals->image) }}"><img
                          src="{{ url('data_file/'.$generals->image) }}" alt="Canvas Logo"></a>
              </div>

              <div id="top-account" class="dropdown">
                  <a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i></a>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                      <a class="dropdown-item tleft" href="#">Profile</a>
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


              <nav id="primary-menu">
                  <ul>
                      <li class="current"><a href="/">
                              <div>Home</div>
                          </a></li>
                      <li><a href="/cara-order">Cara Order</a></li>
                      <li><a href="/syarat-ketentuan">Syarat & Ketentuan</a></li>
                      <li><a href="/faq">FAQ</a></li>
                      <li><a href="/blog">Blog</a></li>
                  </ul>

                  {{-- <div id="top-cart">
                            <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
                            <div class="top-cart-content">
                                <div class="top-cart-title">
                                    <h4>Shopping Cart</h4>
                                </div>
                                <div class="top-cart-items">
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="images/shop/small/1.jpg"
                                                    alt="Blue Round-Neck Tshirt" /></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="#">Blue Round-Neck Tshirt</a>
                                            <span class="top-cart-item-price">$19.99</span>
                                            <span class="top-cart-item-quantity">x 2</span>
                                        </div>
                                    </div>
                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="#"><img src="images/shop/small/6.jpg"
                                                    alt="Light Blue Denim Dress" /></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="#">Light Blue Denim Dress</a>
                                            <span class="top-cart-item-price">$24.99</span>
                                            <span class="top-cart-item-quantity">x 3</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price">$114.95</span>
                                    <button class="button button-3d button-small nomargin fright">View Cart</button>
                                </div>
                            </div>
                        </div> --}}

                  {{-- <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i
                                    class="icon-line-cross"></i></a>
                            <form action="http://themes.semicolonweb.com/html/canvas/search.html" method="get">
                                <input type="text" name="q" class="form-control" value=""
                                    placeholder="Type &amp; Hit Enter..">
                            </form>
                        </div> --}}
              </nav>
          </div>
      </div>
  </header>
