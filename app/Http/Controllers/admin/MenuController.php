<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $appends = [
      'getParentsTree',
    ];

    public static  function getParentsTree($menu, $title) {
        if ($menu->parent_id == 0) {
            return $title;
        }
        $parent = Menu::find($menu->parent_id);
        $title = $parent->title. '>' . $title;

        return MenuController::getParentsTree($parent, $title);
    }
    public function index()
    {
        $menuData = Menu::with('children')->get();
        return view('admin.menu', ['menuData' => $menuData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function  add()
    {
        $parentMenus = Menu::with('children')->get();
        return view('admin.addMenu', ['parentMenus' => $parentMenus]);
    }
    public function create( Request $request)
    {
        DB::table('menus')->insert([
            'parent_id' => $request->input('parent_id'),
            'title' => $request->input('title'),
            'keywords' => $request->input('keywords'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),

        ]);

        return redirect()->route('menu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu, $id)
    {
        $data = Menu::find($id);
        $parentMenus = Menu::with('children')->get();
        return view('admin.editMenu', ['data' => $data, 'parentMenus'=>$parentMenus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Menu $menu, $id)
    {
        $data = Menu::find($id);
        $data->parent_id = $request->input('parent_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('menu');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('menus')->where('id', '=', $id)->delete();
        return redirect()->route('menu');
    }
}
