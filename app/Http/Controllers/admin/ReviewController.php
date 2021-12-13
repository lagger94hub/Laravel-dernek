<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $dataList = Review::all();
        return view('admin.review', ['dataList' => $dataList]);
    }
    public function edit($id)
    {
        $review = Review::find($id);


        return view('admin.editReview', ['review' => $review]);
    }
    public function update(Request $request,$id)
    {
        $data = Review::find($id);
        $data->status = $request->input('status');
        $data->save();
        return redirect()->route('reviewEdit', ['id' => $id])->with('success', 'Review was Updated successfully');

    }
    public function show()
    {

    }
}
