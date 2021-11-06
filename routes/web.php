<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome') ->name('welcome');
//});

// route to home with normal parameters no controller used
Route::get('/home', function () {
    return view('home.index');
});

//route to root  with controller
Route::get('/', [HomeController::class, 'index'])->name("root");

//route to homewithcontrol with url parameters , controller is used
Route::get('/homewithcontrol/{id}/{name}', [HomeController::class, 'indexPara'])->name("controlled")->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


//route to sub_layout using controller
//Route::get('/sublayout', [HomeController::class, 'subLayout']);

//route to main_layout using controller
Route::get('/layout', [HomeController::class, 'layout']);


// redirecting

//Route::redirect('/', '/home');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
