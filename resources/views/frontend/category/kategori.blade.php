@extends('layouts.anasayfa')

@section('aside-page-title','HOME')

@section('sayfa-title')
    <title> Perlantz </title>
@endsection
@section('sayfa-description')@endsection

@section('sayfa-keywords')@endsection

@section('sayfa-author','Rd Global Admin')

@section('tw-title')@endsection
@section('tw-site','@rdglobal_inc')
@section('tw-description')@endsection


@section('fc-title')@endsection

@section('fc-image') @endsection
@section('fc-description')@endsection

@section('content')



    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="">{{$kategori->kategori_adi}}</a></li>

            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb-nav -->

    <div class="page-content mb-10">
        <div class="container">
            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    <div class="sidebar-content scrollable">
                        <!-- Start of Sticky Sidebar -->
                        <div class="sticky-sidebar">
                            <!-- Start of Collapsible widget -->
                            @if(count($altkat)>0)
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Categories</span></h3>
                                <ul class="widget-body filter-items search-ul">

                                    @foreach($altkat as $kat)
                                        <li><a href="{{route('kategori',$kat->slug)}}">{{$kat->kategori_adi}}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                            @else
                            @endif
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Price</span></h3>
                                <div class="widget-body">
                                    <ul class="filter-items search-ul">
                                        <li><a href="#">$0.00 - $100.00</a></li>
                                        <li><a href="#">$100.00 - $200.00</a></li>
                                        <li><a href="#">$200.00 - $300.00</a></li>
                                        <li><a href="#">$300.00 - $500.00</a></li>
                                        <li><a href="#">$500.00+</a></li>
                                    </ul>
                                    <form class="price-range">
                                        <input type="number" name="min_price" class="min_price text-center"
                                               placeholder="$min"><span class="delimiter">-</span><input
                                            type="number" name="max_price" class="max_price text-center"
                                            placeholder="$max"><a href="#"
                                                                  class="btn btn-primary btn-rounded">Go</a>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Size</span></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    <li><a href="#">Extra Large</a></li>
                                    <li><a href="#">Large</a></li>
                                    <li><a href="#">Medium</a></li>
                                    <li><a href="#">Small</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Brand</span></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    <li><a href="#">Elegant Auto Group</a></li>
                                    <li><a href="#">Green Grass</a></li>
                                    <li><a href="#">Node Js</a></li>
                                    <li><a href="#">NS8</a></li>
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">Skysuite Tech</a></li>
                                    <li><a href="#">Sterling</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Color</span></h3>
                                <ul class="widget-body filter-items item-check">
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Green</a></li>
                                    <li><a href="#">Grey</a></li>
                                    <li><a href="#">Orange</a></li>
                                    <li><a href="#">Yellow</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Main Content -->
                <div class="main-content">
                    <!-- Start of Shop Banner -->
                    <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs"
                         style="background-image: url(/frontend/images/shop/banner1.jpg); background-color: #FFC74E;">
                        <div class="banner-content">
                            <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                            <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">Smart
                                Watches</h3>
                            <a href=""
                               class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- End of Shop Banner -->

                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                    class="w-icon-category"></i><span>Filters</span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box">
                                <select name="count" class="form-control">
                                    <option value="9">Show 9</option>
                                    <option value="12" selected="selected">Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout">
                                <a href="shop-boxed-banner.html" class="icon-mode-grid btn-layout active">
                                    <i class="w-icon-grid"></i>
                                </a>
                                <a href="shop-list.html" class="icon-mode-list btn-layout">
                                    <i class="w-icon-list"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/1.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">3D Television</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(3 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $220.00 - $230.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/2-1.jpg" alt="Product" width="300"
                                             height="338" />
                                        <img src="/frontend/images/shop/2-2.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-countdown-container">
                                        <div class="product-countdown countdown-compact" data-until="2021, 9, 9"
                                             data-format="DHMS" data-compact="false"
                                             data-labels-short="Days, Hours, Mins, Secs">
                                            00:00:00:00</div>
                                    </div>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Alarm Clock With Lamp</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(10 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">$30.00</ins><del
                                                class="old-price">$60.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/3.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Apple Laptop</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(5 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $1,000.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/4.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Attachable Charge Alarm</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(7 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $15.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/5.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Fashion</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Best Travel Bag</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(4 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $83.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/6.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Sports</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Black Stunt Motor</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(12 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $374.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/7-1.jpg" alt="Product" width="300"
                                             height="338" />
                                        <img src="/frontend/images/shop/7-2.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Fashion</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Blue Sky Trunk</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(9 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $85.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/8.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Beauty</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Bodycare Smooth Powder</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(4 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $25.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/9.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Bright Green IPhone</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(4 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $950.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/10.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Fashion</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Cavin Fashion Suede Handbag</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(4 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $163.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/11-1.jpg" alt="Product" width="300"
                                             height="338" />
                                        <img src="/frontend/images/shop/11-2.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Charming Design Watch</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(10 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $30.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="/frontend/images/shop/12.jpg" alt="Product" width="300"
                                             height="338" />
                                    </a>
                                    <div class="product-action-horizontal">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                           title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                           title="Wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                           title="Compare"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quick View"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="#">Fashion</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="#">Classic Simple Backpack</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product.html" class="rating-reviews">(9 reviews)</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            $85.00
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="toolbox toolbox-pagination justify-content-between">
                        <p class="showing-info mb-2 mb-sm-0">
                            Showing<span>1-12 of 60</span>Products
                        </p>
                        <ul class="pagination">
                            <li class="prev disabled">
                                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <i class="w-icon-long-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="next">
                                <a href="#" aria-label="Next">
                                    Next<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>




@endsection


