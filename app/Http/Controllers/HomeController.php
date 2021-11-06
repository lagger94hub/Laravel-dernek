<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
//    public function welcome() {
//        return view('welcome');
//    }
    public function index()
    {
        return view('home.index');
    }

    public function layout()
    {
        return view('layouts.main_layout');
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
