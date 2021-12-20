<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $contentData = DB::select('select * from contents');
        $contentData = Content::with('menu')->where('user_id', Auth::id())->get();
        return view('home.user_content', ['contentData' => $contentData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $menus = Menu::with('children')->get();
        return view('home.user_add_content', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//

        $data = new Content;
        $data->menu_id = $request->input('menu_id');
        $data->title= $request->input('title');
        $data->keywords= $request->input('keywords');
        $data->description = $request->input('description');
        $data->detail = $request->input('detail');
        $data->type= $request->input('type');
        if($request->file('image')){
            $data->image = Storage::putFile('images', $request->file("image"));
        }
        $data->user_id = Auth::id();
        $data->save();
        $contentId = $data->id;
        return redirect()->route('user_create_payment', ['contentId' => $contentId]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content, $id)
    {
        $data = Content::find($id);
        $menus = Menu::with('children')->get();
        return view('home.user_edit_content', ['data' => $data, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Content::find($id);
        $data->menu_id = $request->input('menu_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        if ($request->file('image') != null) {
            $data->image = Storage::putFile('images', $request->file("image"));
        }
        $data->type = $request->input('type');
        $data->detail = $request->input('detail');
//        $data->status = $request->input('status');
        $data->user_id = Auth::id();

        $data->save();
        return redirect()->route('user_content')->with('success', 'Content Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('contents')->where('id', '=', $id)->delete();
        return redirect()->route('user_content')->with('success', 'Content Deleted Successfully');;
    }
}
