<?php
namespace App\Helpers\Admin;

use Illuminate\Support\Facades\DB;

class MenuItemHelper {

    public static function get_all_category($id) {

        $cats = DB::table('menu_items')->where('menu', $id)->get();

        return $cats;
    }

    public static function get_child_category_by_root($root_id = 0) {

        $cats = DB::table('menu_items')->get();

        $cats_order = array();

        $exclude_array_id = array();

        self::recursive_category($cats,$root_id,$cats_order, $exclude_array_id);

        return $cats_order;
    }

    public static function get_all_category_by_order($menu_id = 0,$exclude_id = 0) {

        $cats = self::get_all_category($menu_id)->all();

        $cats_order = array();

        $exclude_array_id = array();

        self::recursive_category($cats,0,$cats_order, $exclude_array_id);

        if ($exclude_id) {
            $exclude_array = array();
            $exclude_array_id = array();

            self::recursive_category($cats,$exclude_id,$exclude_array, $exclude_array_id);

            if ($cats_order) {
                foreach ($cats_order as $k => $cats_order_item) {
                    if(in_array($cats_order_item->id, $exclude_array_id)) {
                        $exclude_array[] = $cats_order_item->id;
                        unset($cats_order[$k]);
                    }
                }
            }
        }

        return $cats_order;
    }

    public static function recursive_category($sourceArr, $parents = 0, &$resultArr, &$exclude_array_id){
        if(count($sourceArr)>0){
            foreach ($sourceArr as $key => $value){
                if($value->parent_id == $parents){
                    $resultArr[] = $value;
                    $exclude_array_id[] = $value->id;
                    $newParents = $value->id;
                    unset($sourceArr[$key]);
                    self::recursive_category($sourceArr, $newParents, $resultArr, $exclude_array_id);
                }
            }
        }
    }


}