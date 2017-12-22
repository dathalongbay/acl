@extends('site.layouts.site')

@section('content')
    <div class="ban-top">
        <div class="container">
            <div class="top_nav_left">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav menu__list">
                                <li class="active menu__item "><a class="menu__link" href="index.html">Home <span class="sr-only">(current)</span></a></li>
                                <li class="dropdown menu__item">
                                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">men's wear <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                                <a href="mens.html"><img src="<?php echo url('theme/smart_shop/web/images/woo1.jpg') ?>" alt=" "/></a>
                                            </div>
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="mens.html">Clothing</a></li>
                                                    <li><a href="mens.html">Wallets</a></li>
                                                    <li><a href="mens.html">Footwear</a></li>
                                                    <li><a href="mens.html">Watches</a></li>
                                                    <li><a href="mens.html">Accessories</a></li>
                                                    <li><a href="mens.html">Bags</a></li>
                                                    <li><a href="mens.html">Caps & Hats</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="mens.html">Jewellery</a></li>
                                                    <li><a href="mens.html">Sunglasses</a></li>
                                                    <li><a href="mens.html">Perfumes</a></li>
                                                    <li><a href="mens.html">Beauty</a></li>
                                                    <li><a href="mens.html">Shirts</a></li>
                                                    <li><a href="mens.html">Sunglasses</a></li>
                                                    <li><a href="mens.html">Swimwear</a></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown menu__item">
                                    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">women's wear <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="womens.html">Clothing</a></li>
                                                    <li><a href="womens.html">Wallets</a></li>
                                                    <li><a href="womens.html">Footwear</a></li>
                                                    <li><a href="womens.html">Watches</a></li>
                                                    <li><a href="womens.html">Accessories</a></li>
                                                    <li><a href="womens.html">Bags</a></li>
                                                    <li><a href="womens.html">Caps & Hats</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3 multi-gd-img">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="womens.html">Jewellery</a></li>
                                                    <li><a href="womens.html">Sunglasses</a></li>
                                                    <li><a href="womens.html">Perfumes</a></li>
                                                    <li><a href="womens.html">Beauty</a></li>
                                                    <li><a href="womens.html">Shirts</a></li>
                                                    <li><a href="womens.html">Sunglasses</a></li>
                                                    <li><a href="womens.html">Swimwear</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                                <a href="womens.html"><img src="<?php echo url('theme/smart_shop/web/images/woo.jpg') ?>" alt=" "/></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                </li>
                                <li class=" menu__item"><a class="menu__link" href="electronics.html">Electronics</a></li>
                                <li class=" menu__item"><a class="menu__link" href="codes.html">Short Codes</a></li>
                                <li class=" menu__item"><a class="menu__link" href="contact.html">contact</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="top_nav_right">
                <div class="cart box_1">
                    <a href="<?php echo url('/cart') ?>">
                        <h3> <div class="total">
                                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                                <span id="simpleCart_total" class="simpleCart_total">{{$total}} $</span> (<span id="simpleCart_quantity" class="simpleCart_quantity">{{$total_quantity}}</span> items)</div>

                        </h3>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //banner-top -->
    <!-- banner -->
    <div class="page-head">
        <div class="container">
            <h3>Check out</h3>
        </div>
    </div>
    <!-- //banner -->
    <!-- check out -->
    <div class="checkout">
        <div class="container">
            <div class="alert alert-success">
                Please enter information to complete order. You will payment by Cash on delivery method.
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('checkout.submit') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="phone">Phone </label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" >
                </div>

                <div class="form-group">
                    <label for="comment">Address :</label>
                    <textarea class="form-control" rows="5" name="address">{{ old('address') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="comment">Description :</label>
                    <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Checkout</button>
            </form>
        </div>
    </div>
    <!-- //check out -->
    <!-- //product-nav -->
    <div class="coupons">
        <div class="container">
            <div class="coupons-grids text-center">
                <div class="col-md-3 coupons-gd">
                    <h3>Buy your product in a simple way</h3>
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <h4>LOGIN TO YOUR ACCOUNT</h4>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                        sit amet, consectetur.</p>
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <h4>SELECT YOUR ITEM</h4>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                        sit amet, consectetur.</p>
                </div>
                <div class="col-md-3 coupons-gd">
                    <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                    <h4>MAKE PAYMENT</h4>
                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor
                        sit amet, consectetur.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

@endsection