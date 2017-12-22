@extends('site.layouts.site')

@section('content')

    <script type="text/javascript">
        $(document).ready(function () {


            $('.item_add_cart').on('click', function(e){
                e.preventDefault();

                var dataPost = {};
                var id = $(this).data('id');
                dataPost.id = id;
                var _token = '<?php echo csrf_token() ?>';

                dataPost._token = _token;

                $.ajax(
                        {
                            url: "/cart",
                            data: dataPost,
                            type: 'POST',
                            success: function(result){
                                console.log(result);

                                $('#simpleCart_quantity').html(result.total_quantity);
                                $('#simpleCart_total').html('$' + result.total);


                                $(window).scrollTop(0);
                            }});
            });
        });

    </script>
<!-- banner -->
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
                            <li class="active menu__item menu__item--current"><a class="menu__link" href="index.html">Home <span class="sr-only">(current)</span></a></li>
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
                <p><a href="{{ url('/cart-clear') }}" class="simpleCart_empty">Empty Cart</a></p>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Men's Wear</h3>
    </div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="men-wear">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="css-treeview">
                <h4>Categories</h4>
                <ul class="tree-list-pad">
                    @foreach($cat_list as $cat)
                        <li><a href="{{ url('/category/'.$cat->id) }}">{{ str_repeat('-', $cat->level) }} {{ $cat->title }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-8 products-right">

            <div class="men-wear-top">
                <script src="{{ asset('site/js/responsiveslides.min.js') }}"></script>
                <script>
                    // You can also use "$(window).load(function() {"
                    $(function () {
                        // Slideshow 4
                        $("#slider3").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });
                    });
                </script>
                <div  id="top" class="callbacks_container">
                    <ul class="rslides" id="slider3">
                        <li>
                            <img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/men1.jpg') ?>" alt=" "/>
                        </li>
                        <li>
                            <img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/men2.jpg') ?>" alt=" "/>
                        </li>
                        <li>
                            <img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/men1.jpg') ?>" alt=" "/>
                        </li>
                        <li>
                            <img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/men2.jpg') ?>" alt=" "/>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="men-wear-bottom">
                <div class="col-sm-4 men-wear-left">
                    <?php if ($category->image) : ?>
                        <img class="img-responsive" src="<?php echo url($category->image) ?>" alt=" " />
                    <?php endif; ?>
                </div>
                <div class="col-sm-8 men-wear-right">
                    <h4>{{ $category->title }}</h4>
                    <p>{!! $category->desc !!} </p>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div class="single-pro">

            <?php $i = 0; ?>

            @foreach($products as $product)

                <?php
                if (($i % 4) == 0 && ($i > 0)) {
                    $ext_class = 'clr-both';
                } else {
                    $ext_class = '';
                }
                $i++;
                ?>

                <div class="col-md-3 product-men yes-marg <?php echo $ext_class; ?>">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <?php if ($product->image) : ?>
                            <img src="<?php echo url($product->image) ?>" alt="" class="pro-image-front">
                            <img src="<?php echo url($product->image) ?>" alt="" class="pro-image-back">
                            <?php endif; ?>
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="<?php echo url('/product/'.$product->id) ?>" class="link-product-add-cart">Quick View</a>
                                </div>
                            </div>
                            <span class="product-new-top">New</span>

                        </div>
                        <div class="item-info-product ">
                            <h4><a href="<?php echo url('/product/'.$product->id) ?>"><?php echo $product->title; ?></a></h4>
                            <div class="info-product-price">
                                <span class="item_price">$<?php echo $product->price; ?></span>
                                <del>$69.71</del>
                            </div>
                            <a href="#" data-id="<?php echo $product->id; ?>" class="item_add_cart single-item hvr-outline-out button2">Add to cart</a>
                        </div>
                    </div>
                </div>

            @endforeach

            <div class="clearfix"></div>
        </div>
        <div class="pagination-grid text-right">

            {{ $products->links() }}

        </div>
    </div>
</div>
<!-- //mens -->
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