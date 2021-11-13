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



// route to home with normal parameters no controller used
Route::get('/home', function () {
    return view('home.index');
});

//route to root  with controller
Route::get('/', [HomeController::class, 'index'])->name("root");


// route to admin logIn
Route::get('/admin/login', [\App\Http\Controllers\admin\HomeController::class, 'logIn'])->name("adminLogIn");

// route to logInCheck
Route::post('/admin/logincheck', [\App\Http\Controllers\admin\HomeController::class, 'logInCheck'])->name("logInCheck");

// route to logOut
Route::get('/admin/logout', [\App\Http\Controllers\admin\HomeController::class, 'logOut'])->name("adminLogOut");

//admin bundle
Route::middleware('auth')->prefix('admin')->group(function () {

    // route to admin/menu
    Route::get('/', [\App\Http\Controllers\admin\HomeController::class, 'index'])->name("adminHome");
    // Menu operations
    Route::get('menu', [\App\Http\Controllers\admin\MenuController::class, 'index'])->name("menu");
    Route::get('menu/add', [\App\Http\Controllers\admin\MenuController::class, 'add'])->name("menuAdd");
    Route::post('menu/create', [\App\Http\Controllers\admin\MenuController::class, 'create'])->name("menuCreate");
    Route::get('menu/edit/{id}', [\App\Http\Controllers\admin\MenuController::class, 'edit'])->name("menuEdit");
    Route::post('menu/update{id}', [\App\Http\Controllers\admin\MenuController::class, 'update'])->name("menuUpdate");
    Route::get('menu/delete/{id}', [\App\Http\Controllers\admin\MenuController::class, 'destroy'])->name("menuDelete");
    Route::get('menu/show', [\App\Http\Controllers\admin\MenuController::class, 'show'])->name("menuShow");

    // admin/content
    Route::prefix('content')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\ContentController::class, 'index'])->name("content");
        Route::get('add', [\App\Http\Controllers\admin\ContentController::class, 'add'])->name("contentAdd");
        Route::post('store', [\App\Http\Controllers\admin\ContentController::class, 'store'])->name("contentStore");
        Route::get('edit/{id}', [\App\Http\Controllers\admin\ContentController::class, 'edit'])->name("contentEdit");
        Route::post('update{id}', [\App\Http\Controllers\admin\ContentController::class, 'update'])->name("contentUpdate");
        Route::get('delete/{id}', [\App\Http\Controllers\admin\ContentController::class, 'destroy'])->name("contentDelete");
        Route::get('show', [\App\Http\Controllers\admin\ContentController::class, 'show'])->name("contentShow");
    });


});

//route to homewithcontrol with url parameters , controller is used
Route::get('/homewithcontrol/{id}/{name}', [HomeController::class, 'indexPara'])->name("controlled")->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::get('/', function () {
//    return view('welcome') ->name('welcome');
//});

//route to sub_layout using controller
//Route::get('/sublayout', [HomeController::class, 'subLayout']);

//route to main_layout using controller
//Route::get('/layout', [HomeController::class, 'layout']);


// redirecting

//Route::redirect('/', '/home');




