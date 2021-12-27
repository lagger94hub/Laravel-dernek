<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $publicProfile = Profile::where('user_id', '=', $id)->get();
        if ($publicProfile->isEmpty())
            return view('home.create_public_profile');
       return view('home.user_public_profile', ['publicprofile' => $publicProfile[0]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Profile;
        $data->user_id = Auth::user()->id;
        $data->phone= $request->input('phone');
        $data->address = $request->input('address');
        if($request->file('image')){
            $data->image = Storage::putFile('images', $request->file("image"));
        }
        $data->save();
        return redirect()->route('public_profile', ['id' => $data->user_id])->with('success', 'Your public profile was created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $publicprofile = Profile::find($id);
        $publicprofile->address = $request->input('address');
        $publicprofile->phone = $request->input('phone');
        if ($request->file('image') != null) {
            $publicprofile->image = Storage::putFile('images', $request->file("image"));
        }

        $publicprofile->save();
        return redirect()->route('public_profile', ['id' => $publicprofile->user_id])->with('success', 'Your public profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
