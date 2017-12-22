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
        <h3>Single</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
                    </script>
                    <!-- //FlexSlider-->
                    <ul class="slides">

                        @foreach ($product->photos as $photo)

                        <li data-thumb="<?php echo url($photo->url) ?>">
                            <div class="thumb-image"> <img src="<?php echo url($photo->url) ?>" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
            <h3>{{ $product->title }}</h3>
            <p><span class="item_price">$ {{ $product->price }}</span></p>

            <div class="color-quality">
                <div class="color-quality-right">
                    <h5>Quality :</h5>
                    <input type="text" name="quality" id="quality" value="1" style="width: 50px"/>
                </div>
            </div>

            <div class="occasion-cart" style="margin-top: 15px">
                <a href="#" data-id="<?php echo $product->id; ?>" class="item_add_cart item_add hvr-outline-out button2">Add to cart</a>
            </div>

        </div>
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(1)</a></li>
                    <li role="presentation" class="dropdown">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">Information <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                            <li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">cleanse</a></li>
                            <li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">fanny</a></li>
                        </ul>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <h5>Product Brief Description</h5>
                        {!! html_entity_decode($product->desc) !!}
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                        <div class="bootstrap-tab-text-grids">
                            <div class="bootstrap-tab-text-grid">
                                <div class="bootstrap-tab-text-grid-left">
                                    <img src="<?php echo url('theme/smart_shop/web/images/men3.jpg') ?>" alt=" " class="img-responsive">
                                </div>
                                <div class="bootstrap-tab-text-grid-right">
                                    <ul>
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
                                    </ul>
                                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                                        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                        vel eum iure reprehenderit.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="add-review">
                                <h4>add a review</h4>
                                <form>
                                    <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                    <input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">

                                    <textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                                    <input type="submit" value="SEND">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //single -->
<!-- //product-nav -->
    <script type="text/javascript">
        $(document).ready(function () {


            $('.item_add_cart').on('click', function(e){
                e.preventDefault();

                var dataPost = {};
                var id = $(this).data('id');
                dataPost.id = id;
                var _token = '<?php echo csrf_token() ?>';

                if ( $('#quality').length ) {
                    dataPost.quality = $('#quality').val();
                } else {
                    dataPost.quality = 1;
                }

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
@endsection