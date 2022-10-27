@extends('frontend.main_master')
@section('content')

@section('title')
Home | Regal FLower Online Shop
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">


      <!-- ============================================== CONTENT ============================================== -->

      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO  ========================================= -->
     <!-- === ========= SECTION – HERO ==== ======= -->

     <div id="hero">
        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

  @foreach($sliders as $slider)
  <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
    <div class="container-fluid">
      <div class="caption bg-color vertical-center text-left">

        <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
        <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
      </div>
      <!-- /.caption -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.item -->
  @endforeach


        </div>
        <!-- /.owl-carousel -->
      </div>

      <!-- ==== ===== SECTION – HERO : END === ============== -->


        <!-- ========================================= SECTION – HERO : END ========================================= -->

        <!-- ============================================== Info BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner" style="background: #c4a00d !important;">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">special sales</h4>
                    </div>
                  </div>
                  <h6 class="text">40% discount for every purchase above 40k</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free & delivery</h4>
                    </div>
                  </div>
                  <h6 class="text">deliver your products directly at your convenience</h6>
                </div>
              </div>
              <!-- .col -->

              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Reliable Services</h4>
                    </div>
                  </div>
                  <h6 class="text">provide the best customer service</h6>
                </div>
              </div>
              <!-- .col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.info-boxes-inner -->

        </div>
        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->

        <!-- ==============================================  POPULAR products {SCROLL TABS} ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">Popular Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>

              @foreach ($categories as $category)
              <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name_en }}</a></li>
              @endforeach

              {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">VIP</a></li> --}}
              {{-- <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Gifts</a></li> --}}
            </ul>
            <!-- /.nav-tabs -->
          </div>
          <div class="tab-content outer-top-xs">


            {{-- For All Scroll --}}
            <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                    @foreach($products as $product)
                    <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
         <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                            <!-- /.image -->

          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp

            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
                           </div>

                          <!-- /.product-image & tag -->

          <div class="product-info text-left">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
  @if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif
              </a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

           @if ($product->discount_price == NULL)
      <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
           @else
   <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
           @endif


            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->
          <div class="cart clearfix animate-effect">
            <div class="action">
              <ul class="list-unstyled">
                <li class="add-cart-button btn-group">


             <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
        </li>



          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
              </ul>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                      </div>
                      <!-- /.products -->
                    </div>
                    <!-- /.item -->
                    @endforeach<!--  // end all optionproduct foreach  -->
                  </div>
                  <!-- /.home-owl-carousel -->
                </div>
                <!-- /.product-slider -->
              </div>
              <!-- /.tab-pane -->







            {{-- For Another Scroll --}}
            @foreach($categories as $category)
            <div class="tab-pane" id="category{{ $category->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

@php
  $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
@endphp


                  @forelse($catwiseProduct as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp

          <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>
                         </div>

                        <!-- /.product-image -->

        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif
            </a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>

         @if ($product->discount_price == NULL)
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
         @else
 <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
         @endif


          <!-- /.product-price -->

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">

        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
      </li>



        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action -->
        </div>
        <!-- /.cart -->
                      </div>
                      <!-- /.product -->

                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->

                  @empty
                  <h5 class="text-danger">No Product Found</h5>

                  @endforelse<!--  // end all optionproduct foreach  -->




                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
            <!-- /.tab-pane -->
            @endforeach <!-- end categor foreach -->




          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== POPULAR products {SCROLL TABS : END} ============================================== -->

        <!-- ==============================================  BANNER-Half 1 {WIDE PRODUCTS} ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src=" {{ asset('frontend/assets/images/banners/home-banner1.jpg') }} " alt=""> </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div id="hide" class="image"> <img class="img-responsive" src=" {{ asset('frontend/assets/images/banners/home-banner2.jpg') }} " alt=""> </div>
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== [end BANNER-Half 1] WIDE PRODUCTS : END ============================================== -->

        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
         <!-- == === FEATURED PRODUCTS == ==== -->

         <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">Featured products</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


              @foreach($featured as $product)
              <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                            <!-- /.image -->

          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp

            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
                           </div>

                          <!-- /.product-image -->

          <div class="product-info text-left">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
  @if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif
              </a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

           @if ($product->discount_price == NULL)
      <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
           @else
   <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
           @endif


            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->
  <div class="cart clearfix animate-effect">
    <div class="action">
      <ul class="list-unstyled">
        <li class="add-cart-button btn-group">

          <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
        </li>


          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>



        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
      </ul>
    </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                      </div>
                      <!-- /.products -->
                    </div>
              <!-- /.item -->
              @endforeach


            </div>
            <!-- /.home-owl-carousel -->
          </section>
          <!-- /.section -->
          <!-- == ==== FEATURED PRODUCTS : END ==== === -->

        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

          {{-- <!-- == === skip_product_2 PRODUCTS == ==== -->

          <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
  @if(session()->get('language') == 'pidgin') {{ $skip_category_2->category_name_pg }} @else {{ $skip_category_2->category_name_en }} @endif
              </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


              @foreach($skip_product_2 as $product)
              <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                            <!-- /.image -->

          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp

            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
                           </div>

                          <!-- /.product-image -->

          <div class="product-info text-left">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
  @if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif
              </a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

           @if ($product->discount_price == NULL)
      <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
           @else
   <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
           @endif


            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->
          <div class="cart clearfix animate-effect">
            <div class="action">
              <ul class="list-unstyled">
                <li class="add-cart-button btn-group">


            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
        </li>



          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
              </ul>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                      </div>
                      <!-- /.products -->
                    </div>
              <!-- /.item -->
              @endforeach


            </div>
            <!-- /.home-owl-carousel -->
          </section>
          <!-- /.section -->
          <!-- == ==== skip_product_2 PRODUCTS : END ==== === --> --}}

          <!-- == === skip_product_1 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
  {{-- @if(session()->get('language') == 'pidgin') {{ $skip_category_1->category_name_pg }} @else {{ $skip_category_1->category_name_en }} @endif --}}
  BIRTHDAY, ROMANCE & ANNIVERSARY FLOWERS
              </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


              @foreach($skip_product_1 as $product)
              <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                            <!-- /.image -->

          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp

            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
                           </div>

                          <!-- /.product-image -->

          <div class="product-info text-left">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
  @if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif
              </a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

           @if ($product->discount_price == NULL)
      <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
           @else
   <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
           @endif


            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->
          <div class="cart clearfix animate-effect">
            <div class="action">
              <ul class="list-unstyled">
                <li class="add-cart-button btn-group">


             <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
        </li>



          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
              </ul>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                      </div>
                      <!-- /.products -->
                    </div>
              <!-- /.item -->
              @endforeach


            </div>
            <!-- /.home-owl-carousel -->
          </section>
          <!-- /.section -->
          <!-- == ==== skip_product_1 PRODUCTS : END ==== === -->










        <!-- ============================================== Banner-full 1 WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src=" {{ asset('frontend/assets/images/banners/home-banner.jpg') }} " alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Gift Package<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== Banner-full 1 : END ============================================== -->

        <!-- ============================================== Best Selling Category Bonquets============================================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">All Best Selling Categories <span style="color: #c4a00d; font-size: 12px;">(In Luxury Items)</h3></span>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products best-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/a-anniversary.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Anniversary Flowers</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>


                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/birthday.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Birthday Flowers</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="products best-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/cakeslider-1.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Cakes</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>


                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/Teddy-Bear-Romantic.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Teddy Bears</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="products best-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/bridal.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Bridal</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>


                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/chocolates.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Chocolates</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>

               <div class="item">
                <div class="products best-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/get-well-soon.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Get Well Soon</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>


                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/just-to-say.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Just TO Say</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="products best-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/mothers-day.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Mother's Day</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>


                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/romance.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Romance Flowers</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="products best-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/rose.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Forever Rose</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>


                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                 <a href="/index.php/subsubcategory/product/33/anniversary">
                                <img src=" {{ asset('frontend/assets/images/category/yellow-funeral-wreath.jpg') }} " alt="">
                             </a>
                            </div>
                            <!-- /.image -->
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="/index.php/subsubcategory/product/33/anniversary">Wreath</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">From $450.99 + </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== Best Selling Category  : END ============================================== -->







        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="#"><img src="{{ asset('frontend/assets/images/blog-post/post1.jpg') }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="#"><img src=" {{ asset('frontend/assets/images/blog-post/post2.jpg') }} " alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="#"><img src=" {{ asset('frontend/assets/images/blog-post/post1.jpg') }} " alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src=" {{ asset('frontend/assets/images/blog-post/post2.jpg') }} " alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src=" {{ asset('frontend/assets/images/blog-post/post1.jpg') }} " alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
              </div>
              <!-- /.item -->

            </div>
            <!-- /.owl-carousel -->
          </div>
          <!-- /.blog-slider-container -->
        </section>
        <!-- /.section -->
        <!-- ============================================== BLOG SLIDER : END ============================================== -->


        <!-- ==============================================  BANNER-Half 2  {WIDE PRODUCTS} ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-7 col-sm-7">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src=" {{ asset('frontend/assets/images/banners/home-banner1.jpg') }} " alt=""> </div>
                </div>
                <!-- /.wide-banner -->
              </div>
              <!-- /.col -->
              <div class="col-md-5 col-sm-5">
                <div class="wide-banner cnt-strip">
                  <div id="hide" class="image"> <img class="img-responsive" src=" {{ asset('frontend/assets/images/banners/home-banner2.jpg') }} " alt=""> </div>
                </div>
                <!-- /.wide-banner -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.wide-banners -->
        <!-- ==============================================  BANNER-Half 2 {WIDE PRODUCTS} ============================================== -->



        <!-- ==============================================  Vip Products ============================================== -->
             <!-- == === skip_brand_product_3 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
                @if(session()->get('language') == 'pidgin') {{ $skip_category_3->category_name_pg }} @else The {{ $skip_category_3->category_name_en }} @endif
                            </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


              @foreach($skip_product_3 as $product)
              <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                            <!-- /.image -->

          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp

            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
                           </div>

                          <!-- /.product-image -->

          <div class="product-info text-left">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
  @if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif
              </a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

           @if ($product->discount_price == NULL)
      <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
           @else
   <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
           @endif


            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->
          <div class="cart clearfix animate-effect">
            <div class="action">
              <ul class="list-unstyled">
                <li class="add-cart-button btn-group">

                 <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
        </li>



          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
              </ul>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                      </div>
                      <!-- /.products -->
                    </div>
              <!-- /.item -->
              @endforeach


            </div>
            <!-- /.home-owl-carousel -->
          </section>
          <!-- /.section -->
          <!-- == ==== skip_brand_product_3 PRODUCTS : END ==== === -->




        <!-- ============================================== Gifts: Don't Forget To Add These Gifts : Start ============================================== -->
          <!-- == === skip_product_2 PRODUCTS == ==== -->

          <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">
  @if(session()->get('language') == 'pidgin') {{ $skip_category_2->category_name_pg }} @else Don't Forget To Add These {{ $skip_category_2->category_name_en }} @endif
              </h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


              @foreach($skip_product_2 as $product)
              <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                            <!-- /.image -->

          @php
          $amount = $product->selling_price - $product->discount_price;
          $discount = ($amount/$product->selling_price) * 100;
          @endphp

            <div>
              @if ($product->discount_price == NULL)
              <div class="tag new"><span>new</span></div>
              @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
              @endif
            </div>
                           </div>

                          <!-- /.product-image -->

          <div class="product-info text-left">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
  @if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif
              </a></h3>
            <div class="rating rateit-small"></div>
            <div class="description"></div>

           @if ($product->discount_price == NULL)
      <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
           @else
   <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
           @endif


            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->
          <div class="cart clearfix animate-effect">
            <div class="action">
              <ul class="list-unstyled">
                <li class="add-cart-button btn-group">


            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
        </li>



          <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
              </ul>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
                        </div>
                        <!-- /.product -->

                      </div>
                      <!-- /.products -->
                    </div>
              <!-- /.item -->
              @endforeach


            </div>
            <!-- /.home-owl-carousel -->
          </section>
          <!-- /.section -->
          <!-- == ==== skip_product_2 PRODUCTS : END ==== === -->



        <!-- ============================================== Don't Forget To Add These Gifts : End ============================================== -->

                    <!-- ============================================== Info BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                      <div class="info-boxes-inner" style="background: #c4a00d !important;">
                        <div class="row">
                          <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                              <div class="row">
                                <div class="col-xs-12">
                                  <h4 class="info-box-heading green">special sales</h4>
                                </div>
                              </div>
                              <h6 class="text">40% discount for every purchase above 40k</h6>
                            </div>
                          </div>
                          <!-- .col -->

                          <div class="hidden-md col-sm-4 col-lg-4">
                            <div class="info-box">
                              <div class="row">
                                <div class="col-xs-12">
                                  <h4 class="info-box-heading green">free & delivery</h4>
                                </div>
                              </div>
                              <h6 class="text">deliver your products directly at your convenience</h6>
                            </div>
                          </div>
                          <!-- .col -->

                          <div class="col-md-6 col-sm-4 col-lg-4">
                            <div class="info-box">
                              <div class="row">
                                <div class="col-xs-12">
                                  <h4 class="info-box-heading green">Reliable Services</h4>
                                </div>
                              </div>
                              <h6 class="text">provide the best customer service</h6>
                            </div>
                          </div>
                          <!-- .col -->
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.info-boxes-inner -->

                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->

      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->

      <!-- ----------------- COL2 ------------------ -->


            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3">

              <!-- ================================== TOP NAVIGATION ================================== -->

              <!-- ================================== TOP NAVIGATION : END ================================== -->

              <!-- ============================================== HOT DEALS ============================================== -->

              @include('frontend.common.hot_deals')


              <!-- ============================================== HOT DEALS: END ============================================== -->

              <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Offer</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



                <div class="item">
                  <div class="products special-product">

                @foreach($special_offer as $product)
    <div class="product">
      <div class="product-micro">
        <div class="row product-micro-row">
          <div class="col col-xs-5">
            <div class="product-image">
              <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </a> </div>
              <!-- /.image -->

            </div>
            <!-- /.product-image -->
          </div>
          <!-- /.col -->
          <div class="col col-xs-7">
            <div class="product-info">
              <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif</a></h3>
              <div class="rating rateit-small"></div>
   <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
              <!-- /.product-price -->

            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.product-micro-row -->
      </div>
      <!-- /.product-micro -->

    </div>
                    @endforeach <!-- // end special offer foreach -->





                  </div>
                </div>

              </div>
            </div>
            <!-- /.sidebar-widget-body -->
          </div>
          <!-- /.sidebar-widget -->
          <!-- ============================================== SPECIAL OFFER : END ============================================== -->


              <!-- ============================================== PRODUCT TAGS ============================================== -->
              @include('frontend.common.product_tags')
              <!-- ============================================== PRODUCT TAGS : END ============================================== -->


             <!-- ============================================== Add-On's ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Add-On's</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                <div class="item">
                  <div class="products special-product">

     @foreach($add_on as $product)
        <div class="product">
          <div class="product-micro">
            <div class="row product-micro-row">
              <div class="col col-xs-5">
                <div class="product-image">
                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}"  alt=""> </a> </div>
                  <!-- /.image -->

                </div>
                <!-- /.product-image -->
              </div>
              <!-- /.col -->
              <div class="col col-xs-7">
                <div class="product-info">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                  <!-- /.product-price -->

                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

        </div>
        @endforeach <!-- // end special deals foreach -->




                  </div>
                </div>



              </div>
            </div>
            <!-- /.sidebar-widget-body -->
          </div>
          <!-- /.sidebar-widget -->
          <!-- ============================================== Add-On's : END ============================================== -->

              <!-- ============================================== NEWSLETTER ============================================== -->
              <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                <h3 class="section-title">Newsletters</h3>
                <div class="sidebar-widget-body outer-top-xs">
                  <p>Sign Up for Our Newsletter!</p>
                  <form>
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                    </div>
                    <button class="btn btn-primary">Subscribe</button>
                  </form>
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== NEWSLETTER: END ============================================== -->

              <!-- ============================================== Testimonials============================================== -->
              @include('frontend.common.testimonials')
              <!-- ============================================== Testimonials: END ============================================== -->

              <!-- ============================================== Download App Banner ============================================== -->
              <div class="home-banner"> <img src=" {{ asset('frontend/assets/images/banners/LHS-banner.jpg') }} " alt="Image"> </div>
              <!-- ============================================== Download App Banner: END ============================================== -->


              <!-- ============================================== HOT DEALS ============================================== -->

              @include('frontend.common.hot_deals')

              <!-- ============================================== HOT DEALS: END ============================================== -->

               <!-- ============================================== NEWSLETTER ============================================== -->
               <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                <h3 class="section-title">Newsletters</h3>
                <div class="sidebar-widget-body outer-top-xs">
                  <p>Sign Up for Our Newsletter!</p>
                  <form>
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                    </div>
                    <button class="btn btn-primary">Subscribe</button>
                  </form>
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== NEWSLETTER: END ============================================== -->


               <!-- ============================================== Download App Banner ============================================== -->
               <div class="home-banner"> <img src=" {{ asset('frontend/assets/images/banners/LHS-banner.jpg') }} " alt="Image"> </div>
               <!-- ============================================== Download App Banner: END ============================================== -->

               <br>
                  <!-- ============================================== Add-On's ============================================== -->

        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Extra's</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">


                <div class="item">
                  <div class="products special-product">

     @foreach($add_on as $product)
        <div class="product">
          <div class="product-micro">
            <div class="row product-micro-row">
              <div class="col col-xs-5">
                <div class="product-image">
                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}"  alt=""> </a> </div>
                  <!-- /.image -->

                </div>
                <!-- /.product-image -->
              </div>
              <!-- /.col -->
              <div class="col col-xs-7">
                <div class="product-info">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'pidgin') {{ $product->product_name_pg }} @else {{ $product->product_name_en }} @endif</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                  <!-- /.product-price -->

                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.product-micro-row -->
          </div>
          <!-- /.product-micro -->

        </div>
        @endforeach <!-- // end special deals foreach -->




                  </div>
                </div>



              </div>
            </div>
            <!-- /.sidebar-widget-body -->
          </div>
          <!-- /.sidebar-widget -->
          <!-- ============================================== Add-On's : END ============================================== -->

          <!-- ============================================== Testimonials============================================== -->
<!----------- Testimonials------------->
@include('frontend.common.testimonials')
<!-- --------- Testimonials: END ------------ -->
<!-- ============================================== Testimonials: END ============================================== -->

            </div>


            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->
    </div>
    <!-- /.row -->

            <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-9">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src=" {{ asset('frontend/assets/images/banners/home-banner0.jpg') }} " alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Gift Package<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->









    <!-- [[[[[[[[[[[[[[[[[[[[[[============PART 2 {Story: Why Regal Flower Is The Best}===============]]]]]]]]]]]]]]]]]]]]]] -->

    <div class="body-content">
      <div class="container">
        <div class="checkout-box faq-page">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading-title" style="text-align: center;">You Wondering ? <span style="color: #f1c40f;">Why Regal Flower Is No.1</span></h2>
            <!-- <span class="title-tag"> <strong>Warning:</strong> THis is not a typical 'About Us' story, because you see, Regal Flower started in an unusual way.</span> -->
              <span class="title-tag">Last Updated on September, 2022</span>
              <div class="panel-group checkout-steps" id="accordion">
                <!-- checkout-step-01  -->
    <div class="panel panel-default checkout-step-01">

      <!-- panel-heading -->
        <div class="panel-heading">
          <h4 class="unicase-checkout-title">
              <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                <span>1</span>How it Began?
              </a>
           </h4>
        </div>
        <!-- panel-heading -->

      <div id="collapseOne" class="panel-collapse collapse in">

        <!-- panel-body  -->
          <div class="panel-body">
            It was a Sunday morning, the year was 2016, in the vibrant city of Lagos, Nigeria, and our founder, reeling from the very recent heartbreak of his relationship (pgt: She left him) was determined to get his girlfriend back.
            She was traveling to Abuja, Nigeria that afternoon
            <a href="#how-it-began">continue reading</a>.
        </div>
        <!-- panel-body  -->

      </div><!-- row -->
    </div>
    <!-- checkout-step-01  -->
                  <!-- checkout-step-02  -->
                  <div class="panel panel-default checkout-step-02">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
                          <span>2</span>Reputable & Premium Fresh Flower
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        The flower shop would be reputable. Once you place your order, you can completely relax. We have the highest rating  (4.97 stars on average) and the highest number of Google Reviews in Nigeria (over 1000 reviews from our 3 branches).
                        Regal Flowers has delivered to over 10,000 people including various celebrities and 2 Nigerian Presidents. We have probably delivered roses for and to someone you know
                        Furthermore, the flowers are always fresh and imported into Nigeria every week from rose farms across the world. You can definitely say Regal flowers is your plug for reputable and premium fresh flowers in Nigeria
                      </div>
                    </div>
                  </div>
                  <!-- checkout-step-02  -->

                <!-- checkout-step-03  -->
                  <div class="panel panel-default checkout-step-03">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
                           <span>3</span>Quick Delivery in Lagos & Abuja
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        It would offer fast and same-day delivery of flower bouquets and gifts everywhere in Lagos and Abuja.
                        Some locations we offer delivery of fresh flowers in Lagos include Ikoyi, Victoria Island, Ikeja, Lekki Phase 1, Chevron, Lekki, Ajah, Ikate, Sangotedo, Gbagada, Yaba, Surulere, Ilupeju, Magodo, Maryland, Opebi, Ogba, Ogudu, Allen Avenue, and delivery of fresh flowers in Abuja include Wuse 2, Maitama, Central Area, Garki, Jabi, Asokoro, Gwarinpa, Jahi, Lokogoma, Apo, Life Camp, Lugbe, Dawaki, Abuja Municipal Area Council etcetera.
                      </div>
                    </div>
                  </div>
                  <!-- checkout-step-03  -->

                <!-- checkout-step-04  -->
                  <div class="panel panel-default checkout-step-04">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
                          <span>4</span>Alway Open Online & Walk-in 24/7.
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                      <div class="panel-body">
                        It would be open 24 hours not only for online orders but also for walk-ins. We once had a client take us up on the offer by walking in by 3 am. He was on his way to pick up his wife at the airport and wanted to buy red roses to welcome her. He was shocked we were actually open.
                        Regal Flowers and Gifts is also open every day of the year including weekends and public holidays (yes, Christmas, Easter, and New Year's Day too). We are badass like that
                      </div>
                    </div>
                </div>
                <!-- checkout-step-04  -->

                <!-- checkout-step-05  -->
                  <div class="panel panel-default checkout-step-05">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
                          <span>5</span>Flowers For All Occasions & Budgets
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                      <div class="panel-body">
                        We stock flowers for various occasions such as Birthday Flowers, Romantic Flowers, Anniversary Flowers, Mothers’ Day Flowers, Get Well Soon Flowers, Funeral Wreaths, Condolence Flowers, Bridal Bouquets, and of course, Valentine’s Day flowers available
                        And finally, there are suitable options for all budgets, so when you see a design you like, you can simply pick the size that suits your budget. Want to go all out too? We got you, with our VIP Category of roses.
                      </div>
                    </div>
                  </div>
                  <!-- checkout-step-05  -->

                <!-- checkout-step-06  -->
                  <div class="panel panel-default checkout-step-06">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
                          <span>6</span>Onestop Shop for Cakes, Chocolates, Teddies...
                        </a>
                      </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                          Not only will you find the flowers for that special someone, but we also have various gifts to choose from such as cakes, chocolates, teddy bears, perfumes and more.
                        </div>
                    </div>
                  </div>
                  <!-- checkout-step-06  -->

                  <!-- checkout-step-07  -->
                  <div class="panel panel-default checkout-step-07">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSeven">
                          <span>7</span>Well Secure & Easy Payment Methods ?
                        </a>
                      </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse">
                        <div class="panel-body">
                          Regal flowers is the most trusted online fresh flower shop in Nigeria. Looking for where to buy flowers in Nigeria? You can choose from an assortment of flowers in Lagos and Abuja. Order from us today to enjoy same-day delivery on your items. <br>
                          PAY ONLINE OR TRANSFER <br>
                          Bank <br>
                          Regal Flowers Ltd <br>
                          0252862666 <br>
                          GTBank <br>
                          <br>
                          ……………………….
                          <br>
                          Paypal <br>
                          Paypal to email <br>
                          regalflowerspaypal@gmail.com <br>
                          <br>
                          ……………………….
                          <br>
                          Bitcoin Wallet Address <br>
                          12W9vKCcCbKFmYr9bYfbd9SqVvhyK5j4E1 <br>
                          <br>
                          ………………………. <br>
                          <br>
                          Contact us for more payment options (Dollar, Euro, US Bank Transfer, etc) <br>
                          GET IN TOUCH <br>
                          <br>
                          info@regalflowers.com.ng <br>
                          +234 7010006665, +2347010006664, +234 7011992888, <br>
                          <br>
                          Our Head Office/Delivery Center <br>
                          81b, Lafiaji Way, <br>
                          Dolppg Estate, <br>
                          Ikoyi, Lagos‎. <br>
                          <br>
                          Our Abuja Office <br>
                          5, Nairobi Street, <br>
                          off Aminu Kano Crescent, <br>
                          Wuse 2, Abuja.
                        </div>
                    </div>
                  </div>
                  <!-- checkout-step-07  -->

                  <!-- checkout-step-08  -->
                  <div class="panel panel-default checkout-step-08">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseEight">
                          <span>8</span>You Can Reach Us
                        </a>
                      </h4>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse">
                        <div class="panel-body">
                          The first branch is located at Dolppg Estate, Ikoyi (this remains the headquarters and is open 24 hours every day), he and his awesome team soon opened a second branch in Silverbird Galleria, Victoria Island (closes 7 pm every day), and finally the third branch in Wuse 2, Abuja which is also open 24 hours every day.
                          Also, while our phone and WhatsApp lines ( + 2347010006664, +234 7010006665 , + 234 7011992888 ) are officially listed as available till 7 pm, you can usually message us at any time of the day or night and we would respond as soon as we see it. We sometimes have orders we took during the night and delivered in the morning.
                          If we miss your call, we would usually try to call back too (except it’s an international number) in which case we might be unable to do so.
                          We truly are passionate about customer service.
                        </div>
                    </div>
                  </div>
                  <!-- checkout-step-08  -->

                  <!-- checkout-step-09  -->
                  <div class="panel panel-default checkout-step-09">
                    <div class="panel-heading">
                      <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseNine">
                          <span>9</span>An Easy Order Process With Our Web App
                        </a>
                      </h4>
                    </div>
                    <div id="collapseNine" class="panel-collapse collapse">
                        <div class="panel-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                  </div>
                  <!-- checkout-step-09  -->

              </div><!-- /.checkout-steps -->
            </div>
          </div><!-- /.row -->
        </div><!-- /.checkout-box -->

        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
   <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
<!-- [[[[[[[[[[[[[[[[[[[[[[[[[[[=============Story ENDs {why Regal Flower is the best}===============]]]]]]]]]]]]]]]]]]]]]]]]]]] -->

  </div>
  <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->


@endsection
