@extends('site.layouts.site')

@section('content')

    <style type="text/css">
        ul.sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 250px;
            z-index: 1000;
            background: #FFF;
            list-style: none;
        }
        ul.sub-menu li{
            padding: 10px;
            background: #000;
            border-bottom: 1px dashed #FDA30E;
        }

        ul.sub-menu li:last-child {
            border-bottom: none;
        }

        ul.sub-menu li a {
            color: #FFF;
        }
        li.top-menu {
            position: relative;
        }

        ul.sub-menu li {
            position: relative;
        }

        li.top-menu:hover > ul.sub-menu{
            display: block;
        }

        ul.sub-menu li:hover > ul.sub-menu {
            display: block;
            top: 0;
            left: 250px;
        }
    </style>
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
                            {{ FrontMenuHelper::show_top_menu() }}
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
    <div class="banner-grid">
        <div id="visual">
            <div class="slide-visual">
                <!-- Slide Image Area (1000 x 424) -->
                <?php if ($banner->images) : ?>

                <ul class="slide-group">
                    <?php foreach($banner->images as $slideshow) : ?>
                        <li><img class="img-responsive" src="<?php echo url($slideshow->url) ?>" /></li>
                    <?php endforeach; ?>
                </ul>

                <?php endif; ?>

                <!-- Slide Description Image Area (316 x 328) -->
                <div class="script-wrap">
                    <ul class="script-group">
                        <li><div class="inner-script"><img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/baa1.jpg') ?>" alt="Dummy Image" /></div></li>
                        <li><div class="inner-script"><img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/baa2.jpg') ?>" alt="Dummy Image" /></div></li>
                        <li><div class="inner-script"><img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/baa3.jpg') ?>" alt="Dummy Image" /></div></li>
                    </ul>
                    <div class="slide-controller">
                        <a href="#" class="btn-prev"><img src="<?php echo url('theme/smart_shop/web/images/btn_prev.png') ?>" alt="Prev Slide" /></a>
                        <a href="#" class="btn-play"><img src="<?php echo url('theme/smart_shop/web/images/btn_play.png') ?>" alt="Start Slide" /></a>
                        <a href="#" class="btn-pause"><img src="<?php echo url('theme/smart_shop/web/images/btn_pause.png') ?>" alt="Pause Slide" /></a>
                        <a href="#" class="btn-next"><img src="<?php echo url('theme/smart_shop/web/images/btn_next.png') ?>" alt="Next Slide" /></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <script type="text/javascript" src="{{ asset('site/js/pignose.layerslider.js') }}"></script>
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() {
                $('#visual').pignoseLayerSlider({
                    play    : '.btn-play',
                    pause   : '.btn-pause',
                    next    : '.btn-next',
                    prev    : '.btn-prev'
                });
            });
            //]]>
        </script>

    </div>
    <!-- //banner -->

    <div class="product-easy">
        <div class="container">

            <script src="{{ asset('site/js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });

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

            <div class="row">
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
                            <img class="img-responsive" src="<?php echo url('theme/smart_shop/web/images/men3.jpg') ?>" alt=" " />
                        </div>
                        <div class="col-sm-8 men-wear-right">
                            <h4>Smartshop introduction</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
                                ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                                odit aut fugit. </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="sap_tabs" style="margin-top: 50px">
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Latest Products</span></li>
                    </ul>
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content row" aria-labelledby="tab_item-0">

                            <?php if ($products) :
                            $i = 0;
                            ?>
                            <?php foreach($products as $product) : ?>

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
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //product-nav -->



    <div class="pagination-grid" style="width: 300px; margin: 50px auto;">

        {{ $products->links() }}

    </div>

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
