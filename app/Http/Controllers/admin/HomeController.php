<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('menu');
    }

    public function logIn ()
    {
        return view('admin.logIn');
    }
    public  function  logInCheck (Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('admin');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our data'
            ]);
        }
        else {
            return view('admin.logIn');
        }
    }
    public function logOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }


}
