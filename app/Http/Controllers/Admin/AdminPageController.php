<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class AdminPageController extends Controller
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
        $pages = Page::orderby('id', 'asc')->paginate(10);


        return view('admin.page.show', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('admin.page.create', array());
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

        $page = new Product();
        $page->title = $request['title'];
        $page->desc = $request['desc'] ? $request['desc'] : '';

        $page->save();

        return redirect()->route('page.index')
            ->with('flash_message', 'Article,
             '. $page->title.' created');
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

        return redirect()->route('page.index')
            ->with('flash_message',
                'Page added!');
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
        $page = Page::findOrFail($id);

        return view('admin.page.edit', compact('page'));
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

        $page = Product::findOrFail($id);
        $page->title = $request->input('title');
        $page->desc = $request->input('desc');
        $page->save();

        return redirect()->route('page.index',
            $page->id)->with('flash_message',
            'Article, '. $page->title.' updated');
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
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('page.index')
            ->with('flash_message',
                'Product deleted!');
    }
}
