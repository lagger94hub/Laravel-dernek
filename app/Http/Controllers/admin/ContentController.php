<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contentData = DB::select('select * from contents');
        return view('admin.content', ['contentData' => $contentData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $menus = DB::select('select * from menus ');
        return view('admin.addContent', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('contents')->insert([
            'menu_id' => $request->input('menu_id'),
            'title' => $request->input('title'),
            'keywords' => $request->input('keywords'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'status' => $request->input('status'),
            'type' => $request->input('type'),
            'detail' => $request->input('detail'),
            'user_id' => Auth::id()

        ]);

        return redirect()->route('content');
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
    public function edit(Content $content, $id)
    {
        $data = Content::find($id);
        $menus = DB::select('select * from menus');
        return view('admin.editContent', ['data' => $data, 'menus'=>$menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Content::find($id);
        $data->menu_id = $request->input('menu_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->image = $request->input('image');
        $data->type = $request->input('type');
        $data->detail = $request->input('detail');
        $data->status = $request->input('status');
        $data->user_id = Auth::id();

        $data->save();
        return redirect()->route('content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('contents')->where('id', '=', $id)->delete();
        return redirect()->route('content');
    }
}
