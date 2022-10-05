<header class="header-style-1">

  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled list-inline" >
            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>

            @auth
            <li id="hide"><a href="{{ route('login') }}"><i class="icon fa fa-user"></i>User Profile</a></li>
            @else
            <li id="hide"><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
            @endauth


          </ul>
        </div>
        <!-- /.cnt-account -->

        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Naira (NGN)</a></li>
                <li><a href="#">Dollar (USD)</a></li>
                <li><a href="#">Euro (EUR)</a></li>
                <li><a href="#">Pound (GBP)</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">English</a></li>
                <li><a href="#">Pidgin</a></li>
                <li><a href="#">French</a></li>
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled -->
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-top -->
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-3 logo-holder">
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{ url('/') }}"> <img src=" {{ asset('frontend/assets/images/logo.png') }} " alt="logo"> </a> </div>
          <!-- /.logo -->
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
          <!-- /.contact-row -->
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form>
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <li class="menu-header">Most Popular Searches</li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Birthday Flower</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Anniversary Flower</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Love & Romance Flower</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Get Well Soon Flower</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Thank You Flower</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Suprise Package</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- VIP</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Roses</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">-Special Events</a></li>
                    </ul>
                  </li>
                </ul>
                <input class="search-field" placeholder="Search here..." />
                <a class="search-button" href="#" ></a> </div>
            </form>
          </div>
          <!-- /.search-area -->
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->

        <div class="col-xs-7 col-sm-7 col-md-2 animate-dropdown top-cart-row">
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="background-color: #CA0205;">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count">1</span></div>
              <div class="total-price-basket"> <span class="lbl"> </span> <span class="total-price"> <span class="sign">$</span><span class="value">100.00</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">Demo Product</a></h3>
                      <div class="price">$100.00</div>
                    </div>
                    <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$100.00</span> </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total-->

              </li>
            </ul>
            <!-- /.dropdown-menu-->
          </div>
          <!-- /.dropdown-cart -->

          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </div>
  <!-- /.main-header -->

  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
                <li class="dropdown yamm mega-menu"> <a href="category.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">SHOP</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Bouquets</h2>
                            <ul class="links">
                              <li><a href="#">Romance</a></li>
                              <li><a href="#">Bridal </a></li>
                              <li><a href="#">Birthday</a></li>
                              <li><a href="#">Congratulation</a></li>
                              <li><a href="#">I'm Sorry</a></li>
                              <li><a href="#">Proposal</a></li>
                              <li><a href="#">Weaths & Sympathy</a></li>
                            </ul>
                          </div>
                          <!-- /.col -->

                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Occasion</h2>
                            <ul class="links">
                              <li><a href="#">Valentine</a></li>
                              <li><a href="#">Anniversary</a></li>
                              <li><a href="#">Birthday </a></li>
                              <li><a href="#">Corporate</a></li>
                              <li><a href="#">Father's Day</a></li>
                              <li><a href="#">Mother's Day</a></li>
                              <li><a href="#">Condolence</a></li>
                            </ul>
                          </div>
                          <!-- /.col -->

                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Gifts & More</h2>
                            <ul class="links">
                              <li><a href="#">Chocolates & Biscuits</a></li>
                              <li><a href="#">Cakes & Cupcakes</a></li>
                              <li><a href="#">Teddy Bears</a></li>
                              <li><a href="#">Wine & Champagne</a></li>
                              <li><a href="#">Caravaggro Gift Sets</a></li>
                              <li><a href="#">Balloons & Card</a></li>
                              <li><a href="#">Perfumes</a></li>
                            </ul>
                          </div>
                          <!-- /.col -->

                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">More Section</h2>
                            <ul class="links">
                              <li><a href="#">Vip (Statement Flowers) </a></li>
                              <li><a href="#">Get Well Soon</a></li>
                              <li><a href="#">Accessories & <br>Boutonnieres</a></li>
                              <li><a href="#">Card</a></li>
                              <li><a href="#">Sympathy</a></li>
                              <li><a href="#">Cards</a></li>
                            </ul>
                          </div>
                          <!-- /.col -->

                          <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src=" {{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }} " alt=""> </div>
                          <!-- /.yamm-content -->
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown mega-menu">
                <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Flowers <span class="menu-label hot-menu hidden-xs">Specials</span> </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                            <h2 class="title">Statement Flowers(just to say)</h2>
                            <ul class="links">
                              <li><a href="#">I'm Sorry</a></li>
                              <li><a href="#">Get Well Soon</a></li>
                              <li><a href="#">I Love You</a></li>
                              <li><a href="#">Thank You</a></li>
                              <li><a href="#">You're Special</a></li>
                              <li><a href="#">To Her</a></li>
                              <li><a href="#">To Him</a></li>
                              <li><a href="#">Happy Birthday</a></li>
                              <li><a href="#">Congratulation</a></li>
                              <li><a href="#">My Condolence</a></li>
                            </ul>
                          </div>
                          <!-- /.col -->

                          <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                            <h2 class="title">Occasion</h2>
                            <ul class="links">
                              <li><a href="#">Valentine</a></li>
                              <li><a href="#">Anniversary</a></li>
                              <li><a href="#">Birthday</a></li>
                              <li><a href="#">Corporate</a></li>
                              <li><a href="#">Father's Day</a></li>
                              <li><a href="#">Mother's Day</a></li>
                              <li><a href="#">Condolence</a></li>
                              <li><a href="#">Celebation</a></li>
                              <li><a href="#">New Season</a></li>
                            </ul>
                          </div>
                          <!-- /.col -->

                          <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                            <h2 class="title">VIP</h2>
                            <ul class="links">
                              <li><a href="#">Roses</a></li>
                              <li><a href="#">Luxurious Mix</a></li>
                              <li><a href="#">Proposal</a></li>
                              <li><a href="#">Bouquets</a></li>
                              <li><a href="#">Accessories<br>Boutonnieres</a></li>
                              <li><a href="#">New Baby</a></li>
                              <li><a href="#">Loml</a></li>
                              <!-- <li><a href="#">Flashes</a></li>
                              <li><a href="#">Lenses</a></li>
                              <li><a href="#">Surveillance</a></li>
                              <li><a href="#">Tripods</a></li> -->
                            </ul>
                          </div>
                          <!-- /.col -->
                          <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                            <h2 class="title">Sympathy & Funeral</h2>
                            <ul class="links">
                              <li><a href="#">Bouquets</a></li>
                              <li><a href="#">Casket Spray</a></li>
                              <li><a href="#">Wreath</a></li>
                              <li><a href="#">My Condolence</a></li>
                              <li><a href="#">I'm Sorry</a></li>
                              <li><a href="#">Get Well</a></li>
                            </ul>
                          </div>
                          <div id="nav-banner" class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="{{ asset('frontend/assets/images/banners/banner-side.jpg') }} "></a> </div>
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.yamm-content --> </li>
                  </ul>
                </li>
                <li class="dropdown hidden-sm"> <a href="category.html">Gifts <span class="menu-label new-menu hidden-xs">surprise</span> </a> </li>
                <li class="dropdown hidden-sm"> <a href="blog.html">Blog</a> </li>
                <li class="dropdown"> <a href="contact.html">About Us</a> </li>
                <li class="dropdown"> <a href="faq.html">FAQ's</a> </li>
                <li class="dropdown"> <a href="contact.html">Contact Us</a> </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                  <ul class="dropdown-menu pages">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          <div class="col-xs-12 col-menu">
                            <ul class="links">
                              <li><a href="home.html">Home</a></li>
                              <li><a href="category.html">Category</a></li>
                              <li><a href="detail.html">Detail</a></li>
                              <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
                              <li><a href="checkout.html">Checkout</a></li>
                              <li><a href="blog.html">Blog</a></li>
                              <li><a href="blog-details.html">Blog Detail</a></li>
                              <li><a href="contact.html">Contact</a></li>
                              <li><a href="sign-in.html">Sign In</a></li>
                              <li><a href="my-wishlist.html">Wishlist</a></li>
                              <li><a href="terms-conditions.html">Terms and Condition</a></li>
                              <li><a href="track-orders.html">Track Orders</a></li>
                              <li><a href="product-comparison.html">Product-Comparison</a></li>
                              <li><a href="faq.html">FAQ</a></li>
                              <li><a href="404.html">404</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown  navbar-right special-menu"> <a href="#">How It Started</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer -->
          </div>
          <!-- /.navbar-collapse -->

        </div>
        <!-- /.nav-bg-class -->
      </div>
      <!-- /.navbar-default -->
    </div>
    <!-- /.container-class -->

  </div>
  <!-- /.header-nav -->
  <!-- ============================================== NAVBAR : END ============================================== -->

</header>
