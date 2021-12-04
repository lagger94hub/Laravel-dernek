<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Setting;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
//    public function welcome() {
//        return view('welcome');
//    }


    public static function menuList()
    {
        return Menu::where('parent_id', '=', 0)->where('status', '=', 'true')->with('children')->get();
    }
    public static function getSettings()
    {
        return Setting::first();
    }
    public function index()
    {
        $slider = Content::select('id', 'title', 'image', 'description')->limit(4)->get();
        $top = Content::select('id', 'title', 'image', 'description')->inRandomOrder()->limit(4)->get();
        $recent = Content::select('id', 'title', 'image', 'description')->orderByDesc('id')->limit(4)->get();
        $interesting = Content::select('id', 'title', 'image', 'description')->inRandomOrder()->limit(4)->get();



        return view('home.index', ['slider' => $slider, 'top' => $top, 'recent' => $recent, 'interesting' => $interesting]);
    }
    public function about()
    {
        return view('home.about');
    }
    public function contact()
    {

        return view('home.contact');
    }
    public function faq()
    {

        return view('home.faq');
    }
    public function references()
    {

        return view('home.references');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function layout()
    {
        return view('layouts.main_layout');
    }
    public function profile()
    {
        return view('home.userProfile');
    }

    public function sendMessage(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->note = $request->input('note');
        $data->save();
        return redirect()->route('contact')->with('success','Message sent successfully.');
    }

    public function content($id, $title)
    {
        $data = Content::find($id);
        $menu = Menu::find($data->menu_id);
        $images = Image::where('content_id', '=', $id)->get();
        return view('home.content', ['data' => $data, 'menu' => $menu, 'images' => $images]);
    }
    public function menucontent($id)
    {
        $dataList = Content::where('menu_id', '=', $id)->where('status', '=', 'true')->get();
        $menu = Menu::find($id);
        return view('home.menucontent', ['dataList' => $dataList, 'menu' => $menu]);
    }

//    public function subLayout()
//    {
//        return view('home.sub_layout');
//    }



}
