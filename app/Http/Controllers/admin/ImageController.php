<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($contentId)
    {
        $data = Content::find($contentId);
//        $images = Image::whereColumn('content_id', $contentId);
        $images = DB::table('images')->where('content_id','=', $contentId)->get();
        return view('admin.addImage', ['data' => $data, 'images'=>$images]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $contentId)
    {
        $data = new Image;
        $data->content_id = $contentId;
        $data->title = $request->input('title');
        $data->image = Storage::putFile('images', $request->file("image"));

        $data->save();
        return redirect()->route('imageAdd', ['contentId'=>$contentId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($imageId, $contentId)
    {
        DB::table('images')->where('id', '=', $imageId)->delete();
        return redirect()->route('imageAdd', ['contentId' => $contentId]);
    }
}
