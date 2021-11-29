<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Setting;
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
        return Menu::where('parent_id', '=', 0)->with('children')->get();
    }
    public static function getSettings()
    {
        return Setting::first();
    }
    public function index()
    {

        return view('home.index');
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


//    public function subLayout()
//    {
//        return view('home.sub_layout');
//    }


    public function indexPara($id, $name)
    {
        echo "Id number : ", $id, "<br>";
        echo "Name is : ", $name;

        for ($i=0; $i<=$id; $i++) {
            echo $name, "-", $i, "<br>";
        }
    }
}
