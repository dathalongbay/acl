<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\BannerImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use File;


class AdminSettingController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $settings = DB::table('settings')->get();
        $setting = array();

        foreach ($settings as $item) {
            $setting[$item->name] = $item->value;
        }

        return view('admin.setting.setting', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('admin.setting.create', array());
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

        $banner = new Banner();
        $banner->title = $request['title'];
        $banner->except = $request['except'] ? $request['except'] : '';
        $banner->body = $request['body'] ? $request['body'] : '';

        $banner->save();

        if ($request->photos) {
            foreach ($request->photos as $photo) {

                $folder = 'upload/banner/'.$banner->id;

                $url = $photo->move($folder,$photo->getClientOriginalName());

                $banner_image = new BannerImage();

                $banner_image->title = $photo->getClientOriginalName();

                $banner_image->banner_id = $banner->id;

                $banner_image->url = $url;

                $banner_image->save();

            }
        }

        return redirect()->route('banner.index')
            ->with('flash_message', 'Article,
             '. $banner->title.' created');
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

        return redirect()->route('banner.index')
            ->with('flash_message',
                'Role added!');
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
        $settings = DB::table('settings')->get();

        echo "<pre>";
        print_r($settings);
        echo "</pre>";

        exit;
        return view('admin.setting.edit', compact('settings'));
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



        $settings = array(
            'logo', 'favicon', 'site_title', 'header_msg_1', 'header_msg_2',
            'header_msg_3', 'facebook', 'twiter', 'instagram', 'youtube', 'header_menu',
            'slider_homepage', 'process_title', 'process_step_1', 'process_step_1_desc',
            'process_step_2', 'process_step_2_desc', 'process_step_3', 'process_step_3_desc',
            'footer_menu' , 'contact_address', 'contact_mail', 'contact_phone', 'flicker', 'footer_desc',
            'copyright'
        );

        foreach ($settings as $setting) {
            $value = $request->input($setting) ? $request->input($setting) : '';
            DB::table('settings')
                ->where('name', $setting)
                ->update(['value' => $value]);
        }

        return redirect('/administrator/settings')->with('flash_message',
            'Article updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banner.index')
            ->with('flash_message',
                'Banner deleted!');
    }
}
