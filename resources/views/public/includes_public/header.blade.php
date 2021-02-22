<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('essence/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('essence/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('essence/style.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{route('homepage')}}"><img src="{{asset('essence/img/core-img/logo.png')}}"
                        alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Rompers</a></li>
                                        <li><a href="shop.html">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                    <li><a href="regular-page.html">Regular Page</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
            {{-- {{ Auth::logout() }} --}}
            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="{{asset('essence/img/core-img/heart.svg')}}" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="#"><img src="{{asset('essence/img/core-img/user.svg')}}" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">

                    <a href="#" id="essenceCartBtn"><img src="{{asset('essence/img/core-img/bag.svg')}}" alt="">

                        <span> @if(!empty(session()->get('products'))) {{ count(Session::get('products'))  }} @else
                            {{ 0 }} @endif</span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>
    {{-- {{ dd(session()->get('products')) }} --}}

    {{-- {{ session()->forget('products') }} --}}
    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">

            <a href="#" id="rightSideCart"><img src="{{asset('essence/img/core-img/bag.svg')}}" alt="">
                <span>@if(!empty(session()->get('products')))
                    {{ count(Session::get('products'))  }}
                    @else {{ 0 }}
                    @endif</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    @if(!empty(session()->get('products')))
                    @foreach (session()->get('products') as $key => $value)
                    @php

                    $cart_items = App\Models\Admins\Product::find($value);
                    // $cart_items->prod_price;
                    // $cart_items->prod_price;
                    $sum[] = $cart_items->prod_price;
                    @endphp

                    <a href="#" class="product-image">
                        <img src="{{ asset('images/product_images/' . $cart_items->prod_image)}}" class="cart-thumb"
                            alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                            <span class="product-remove"><a href="{{ route('cart_remove',$cart_items->id) }}"><i
                                        class="fa fa-close" aria-hidden="true"></a></i></span>

                            <h6>{{  $cart_items->prod_name }}</h6>
                            {{-- <p class="size">Size: S</p>
                            <p class="color">Color: Red</p> --}}
                            <p class="price">{{  $cart_items->prod_price . " AED" }}</p>
                        </div>
                    </a>

                    @endforeach


                    @else
                    {{ "Cart Is Empty" }}

                    @endif
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    @php


                    @endphp
                    {{-- @dump($cart_items); --}}
                    <li><span>subtotal:</span> <span>
                            @if(session()->get('products'))
                            {{ array_sum($sum) . " AED" }}
                            @else
                            {{ 0 . " AED"}}
                            @endif
                        </span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    {{-- <li><span>discount:</span> <span>-15%</span></li> --}}
                    <li><span>total:</span> <span>@if(session()->get('products'))
                            {{ array_sum($sum) . " AED" }}
                            @else
                            {{ 0 . " AED"}}
                            @endif</span></li>
                </ul>

                {{-- @dump(Auth::guard('admin')->check()) --}}
                {{-- @guest) --}}
                <div class="checkout-btn mt-100">
                    @guest('web')
                    <a href="{{ route('get_login') }}" class="btn essence-btn">you are not logged in</a>
                    @endguest
                    @auth('web')
                    <a href="{{ route('checkout') }}" class="btn essence-btn">CheckOut </a>
                    @endauth

                    {{-- <a href="checkout.html" class="btn essence-btn">check out</a> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->
