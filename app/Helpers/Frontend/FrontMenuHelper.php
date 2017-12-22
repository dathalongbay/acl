<?php
namespace App\Helpers\Frontend;

use Illuminate\Support\Facades\DB;

class FrontMenuHelper {

    public static function recursiveMenu($sourceArr,$parents = 0,&$newMenu){
        if(count($sourceArr)>0){
            $i = 0;
            foreach ($sourceArr as $key => $value){
                if($value->parent_id == $parents){

                    if ($i == 0) {
                        if ($value->level == 1) {
                            $newMenu .= '<ul class="nav navbar-nav menu__list">';
                        } else {
                            $newMenu .= '<ul class="sub-menu">';
                        }
                    }

                    if ($value->level == 1) {
                        $newMenu .= '<li class="menu__item top-menu"><a href="'.$value->url.'" class="menu__link">' . $value->title . '</a>';
                    } else {
                        $newMenu .= '<li><a href="'.$value->url.'">' . $value->title . '</a>';
                    }

                    $newParents = $value->id;
                    unset($sourceArr[$key]);
                    self::recursiveMenu($sourceArr,$newParents, $newMenu);

                    $newMenu .= '</li>';

                    $i++;
                }
            }
            if ($i > 0) {
                $newMenu .= '</ul>';
            }
        }
    }



    public static function show_top_menu() {
        $menus = \MenuItemHelper::get_all_category_by_order(3);



        self::recursiveMenu($menus,0,$newMenu);

        echo $newMenu;
        ?>
        <ul class="nav navbar-nav menu__list" style="display: none">
            <li class="active menu__item menu__item--current">
                <a class="menu__link" href="index.html">Home <span class="sr-only">(current)</span></a></li>
            <li class="menu__item top-menu">
                <a href="index.html" class="dropdown-toggle menu__link">men's wear <span class="caret"></span></a>

                <ul class="sub-menu">
                    <li><a href="womens.html">Clothing</a></li>
                    <li><a href="womens.html">Wallets</a>
                        <ul class="sub-menu">
                            <li><a href="womens.html">Footwear</a></li>
                            <li><a href="womens.html">Watches</a></li>
                            <li><a href="womens.html">Accessories</a></li>
                        </ul>
                    </li>
                    <li><a href="womens.html">Footwear</a></li>
                    <li><a href="womens.html">Watches</a></li>
                    <li><a href="womens.html">Accessories</a></li>
                    <li><a href="womens.html">Bags</a></li>
                    <li><a href="womens.html">Caps & Hats</a></li>
                </ul>
            </li>
            <li class="menu__item top-menu">
                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">women's wear <span class="caret"></span></a>
                <ul class="sub-menu">
                    <li><a href="womens.html">Clothing</a></li>
                    <li><a href="womens.html">Wallets</a>
                        <ul class="sub-menu">
                            <li><a href="womens.html">Footwear</a></li>
                            <li><a href="womens.html">Watches</a></li>
                            <li><a href="womens.html">Accessories</a></li>
                        </ul>
                    </li>
                    <li><a href="womens.html">Footwear</a></li>
                    <li><a href="womens.html">Watches</a></li>
                    <li><a href="womens.html">Accessories</a></li>
                    <li><a href="womens.html">Bags</a></li>
                    <li><a href="womens.html">Caps & Hats</a></li>
                </ul>
            </li>
            <li class=" menu__item top-menu"><a class="menu__link" href="electronics.html">Electronics</a></li>
            <li class=" menu__item top-menu"><a class="menu__link" href="codes.html">Short Codes</a></li>
            <li class=" menu__item top-menu">
                <a class="menu__link" href="contact.html">contact<span class="caret"></span></a>
                <ul class="sub-menu">
                    <li><a href="womens.html">Clothing</a></li>
                    <li><a href="womens.html">Wallets</a>
                        <ul class="sub-menu">
                            <li><a href="womens.html">Footwear</a></li>
                            <li><a href="womens.html">Watches</a></li>
                            <li><a href="womens.html">Accessories</a></li>
                        </ul>
                    </li>
                    <li><a href="womens.html">Footwear</a></li>
                    <li><a href="womens.html">Watches</a></li>
                    <li><a href="womens.html">Accessories</a></li>
                    <li><a href="womens.html">Bags</a></li>
                    <li><a href="womens.html">Caps & Hats</a></li>
                </ul>
            </li>
        </ul>
        <?php
    }


}