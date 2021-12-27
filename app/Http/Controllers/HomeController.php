<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
//    public function welcome() {
//        return view('welcome');
//    }


    public function listReview()
    {
        $datalist = Review::where('user_id', '=', Auth::user()->id)->get();
        return view('home.user_reviews', ['datalist'=>$datalist]);
    }
    public function deleteReview($id)
    {
        DB::table('reviews')->where('id', '=', $id)->delete();
        return redirect()->route('myreview');
    }
    public static function menuList()
    {
        return Menu::where('parent_id', '=', 0)->where('status', '=', 'true')->with('children')->get();
    }
    public static function getSettings()
    {
        return Setting::first();
    }
    public static function countreview($id)
    {
        return Review::where('content_id', $id)->count();
    }
    public static function avrgreview($id)
    {
        return Review::where('content_id', $id)->average('rate');
    }
    public function index()
    {
        $slider = Content::select('id', 'title', 'image', 'description')->where('status', '=', 'True')->limit(4)->get();
        $top = Content::select('id', 'title', 'image', 'description')->where('status', '=', 'True')->inRandomOrder()->limit(4)->get();
        $recent = Content::select('id', 'title', 'image', 'description')->where('status', '=', 'True')->orderByDesc('id')->limit(4)->get();
        $interesting = Content::select('id', 'title', 'image', 'description')->where('status', '=', 'True')->inRandomOrder()->limit(4)->get();



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
        $dataList = Faq::all()->sortBy('position');
        return view('home.faq', ['dataList' => $dataList]);
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
        $reviews = Review::where('content_id', '=',$id)->where('status', '=', 'true')->get();
        $menu = Menu::find($data->menu_id);
        $images = Image::where('content_id', '=', $id)->get();
        return view('home.content', ['data' => $data, 'menu' => $menu, 'images' => $images, 'reviews' => $reviews]);
    }
    public function menucontent($id)
    {
        $dataList = Content::where('menu_id', '=', $id)->where('status', '=', 'true')->get();
        $menu = Menu::find($id);
        return view('home.menucontent', ['dataList' => $dataList, 'menu' => $menu]);
    }
    public function getContent(Request $request) {
        $search = $request->input('search');
        $count = Content::where('title', 'like', '%'.$search.'%')->get()->count();

        if ($count == 1)
        {
            $data = Content::where('title', $request->input('search'))->first();
            return redirect()->route('contentVisit', ['id'=>$data->id, 'title'=>$data->title]);
        }
        else
        {
            return redirect()->route('contentList', ['search' =>$search]);
        }

    }
    public function contentList($search)
    {
        $datalist = Content::where('title', 'like', '%'.$search.'%')->get();
        return view('home.search_content', ['search' => $search, 'datalist'=>$datalist]);
    }


    public function ownerProfile($id)
    {
        $owner = Profile::where('user_id', '=', $id)->get();
        return view('home.owner_profile', ['owner' => $owner]);
    }



}
