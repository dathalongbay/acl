<?php

namespace App\Http\Controllers\Admin;

use App\MenuItems;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use MenuItemHelper;
use CategoryHelper;

class AdminMenuItemsController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($menu_id)
    {
        //
        $menus = MenuItemHelper::get_all_category_by_order($menu_id);

        return view('admin.menuitems.show', compact('menus', 'menu_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($menu)
    {
        //
        $parents = MenuItemHelper::get_all_category_by_order($menu);

        $option_parent = array();
        $option_parent[0] = 'None';

        if ($parents) {
            foreach ($parents as $parent) {
                $option_parent[$parent->id] = str_repeat('-', $parent->level).' '.$parent->title;
            }
        }

        $option_type = array();

        $option_type['category'] = 'Category';
        $option_type['product'] = 'Product';
        $option_type['custom'] = 'Custom';

        $parents_cat = CategoryHelper::get_all_category_by_order();

        $option_cat = array();
        $option_cat[0] = 'None';

        if ($parents_cat) {
            foreach ($parents_cat as $parent_cat) {
                $option_cat[$parent_cat->id] = str_repeat('-', $parent_cat->level).' '.$parent_cat->title;
            }
        }

        $option_product = array();
        $option_product[] = 'None';

        $products = Product::orderby('id', 'asc')->get();

        if ($products) {
            foreach ($products as $product) {
                $option_product[$product->id] = $product->id . ' - ' .$product->title;
            }
        }

        return view('admin.menuitems.create', compact('parents', 'option_parent', 'menu', 'option_type', 'option_cat', 'option_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'title'=>'required|max:100',
            'body' =>'required',
        ]);*/

        $item = new MenuItems();
        $item->title = $request['title'];
        $item->desc = $request['desc'] ? $request['desc'] : '';
        $item->menu = $request['menu'] ? $request['menu'] : '';
        $item->type = $request['type'] ? $request['type'] : '';

        $cat_id = $request['cat_id'] ? $request['cat_id'] : 0;
        $product_id = $request['product_id'] ? $request['product_id'] : 0;
        $custom_url = $request['custom_url'] ? $request['custom_url'] : '';

        if ($item->type == 'category') {
            $item->url = url('/category/'.$cat_id);
        } elseif($item->type == 'product') {
            $item->url = url('/product/'.$product_id);
        } elseif($item->type == 'custom') {
            $item->url = $custom_url;
        } else {
            $item->url = '';
        }

        $params = array(
            'cat_id' => $cat_id,
            'product_id' => $product_id,
            'custom_url' => $custom_url
        );
        $item->params = json_encode($params);

        $parent_id = $request['parent_id'] ? $request['parent_id'] : 0;

        $item->parent_id = $parent_id;

        if ($parent_id == 0) {
            $item->level = 1;
        } else {
            $parent_item = MenuItems::findOrFail($item->parent_id);
            $item->level = $parent_item->level + 1;
        }

        $item->save();

        return redirect()->route('menu-items.index', $item->menu)
            ->with('flash_message', 'Article,
             '. $item->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //

        return redirect()->route('menu-items.index')
            ->with('flash_message',
                'Menu added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $menu = MenuItems::findOrFail($id);
        //

        $parents = MenuItemHelper::get_all_category_by_order($menu->menu, $menu->id);

        $except_parents = array();

        if ($parents) {
            foreach ($parents as $parent) {
                $except_parents[] = $parent->id;
            }
        }

        $option_parent = array();
        $option_parent[0] = 'None';

        if ($parents) {
            foreach ($parents as $parent) {

                if ($parent->id != $menu->id) {
                    $option_parent[$parent->id] = str_repeat('-', $parent->level).' '.$parent->title;
                }

            }
        }

        $option_type = array();

        $option_type['category'] = 'Category';
        $option_type['product'] = 'Product';
        $option_type['custom'] = 'Custom';

        $parents_cat = CategoryHelper::get_all_category_by_order();

        $option_cat = array();
        $option_cat[0] = 'None';

        if ($parents_cat) {
            foreach ($parents_cat as $parent_cat) {
                $option_cat[$parent_cat->id] = str_repeat('-', $parent_cat->level).' '.$parent_cat->title;
            }
        }

        $option_product = array();
        $option_product[] = 'None';

        $products = Product::orderby('id', 'asc')->get();

        if ($products) {
            foreach ($products as $product) {
                $option_product[$product->id] = $product->id . ' - ' .$product->title;
            }
        }

        if ($menu->params) {
            $params = json_decode($menu->params);
        } else {
            $params = new \stdClass();
            $params->cat_id = 0;
            $params->product_id = 0;
            $params->custom_url = '';
        }


        return view('admin.menuitems.edit', compact('menu', 'parents', 'option_parent', 'option_type', 'option_cat', 'option_product', 'params'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        /*$this->validate($request, [
            'title'=>'required|max:100',
            'body'=>'required',
        ]);*/

        $item = MenuItems::findOrFail($id);
        $old_item = clone $item;
        $item->title = $request->input('title');
        $item->desc = $request->input('desc');
        $item->menu = $request->input('menu');
        $item->type = $request->input('type');
        $item->url = '';
        $item->params = '';

        $parent_id = $request->input('parent_id') ? $request->input('parent_id') : 0;

        $item->parent_id = $parent_id;

        if ($parent_id == 0) {
            $item->level = 1;
        } else {
            $parent_item = MenuItems::findOrFail($item->parent_id);
            $item->level = $parent_item->level + 1;
        }

        $cat_id = $request->input('cat_id') ? $request->input('cat_id') : 0;
        $product_id = $request->input('product_id') ? $request->input('product_id') : 0;
        $custom_url = $request['custom_url'] ? $request['custom_url'] : '';

        if ($item->type == 'category') {
            $item->url = url('/category/'.$cat_id);
        } elseif($item->type == 'product') {
            $item->url = url('/product/'.$product_id);
        } elseif($item->type == 'custom') {
            $item->url = $custom_url;
        } else {
            $item->url = '';
        }

        $params = array(
            'cat_id' => $cat_id,
            'product_id' => $product_id,
            'custom_url' => $custom_url
        );
        $item->params = json_encode($params);

        $item->save();

        // Change parent id update all child level
        if ($old_item->parent_id != $parent_id) {
            $child_list = MenuItemHelper::get_child_category_by_root($item->id);

            $child_list_id = array();

            foreach ($child_list as $child_item) {
                if ($child_item->id != $item->id) {
                    $child_list_id[] = '"'.$child_item->id.'"';
                }
            }

            if ($child_list_id) {
                $child_list_str = implode(',', $child_list_id);

                if ($old_item->level > $item->level) {
                    $change_level = $old_item->level - $item->level;
                    DB::statement( "UPDATE menu_items SET level = level - $change_level WHERE id IN($child_list_str)" );
                } elseif ($old_item->level < $item->level) {
                    $change_level = $item->level - $old_item->level;
                    DB::statement( "UPDATE menu_items SET level = level + $change_level WHERE id IN($child_list_str)" );
                } else {

                }

            }

        }

        return redirect()->route('menu-items.index',
            $item->menu)->with('flash_message',
            'Article, '. $item->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, $menu)
    {
        //
        $menuObj = MenuItems::findOrFail($id);
        $menuObj->delete();

        return redirect()->route('menu-items.index', $menu)
            ->with('flash_message',
                'Menu Items deleted!');
    }
}
