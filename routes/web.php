<?php

use App\Http\Controllers\ContentController;
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

//route to index page
Route::get('/', [HomeController::class, 'index'])->name("root");
Route::get('/contact', [HomeController::class, 'contact'])->name("contact");
Route::post('/sendmessage', [HomeController::class, 'sendMessage'])->name("homemessage");

Route::get('/faq', [HomeController::class, 'faq'])->name("faq");
Route::get('/references', [HomeController::class, 'references'])->name("references");
Route::get('/about', [HomeController::class, 'about'])->name("about");
Route::get('/logout', [HomeController::class, 'logout'])->name("logout");


Route::middleware('auth')->prefix('userislem')->group(function() {
    Route::get('/profile', [HomeController::class, 'profile'])->name("profile");
    Route::prefix('mycontent')->group(function () {
        Route::get('/', [ContentController::class, 'index'])->name("user_content");
        Route::get('add', [ContentController::class, 'add'])->name("user_add_content");
        Route::post('store', [ContentController::class, 'store'])->name("user_store_content");
        Route::get('edit/{id}', [ContentController::class, 'edit'])->name("user_edit_content");
        Route::post('update/{id}', [ContentController::class, 'update'])->name("user_update_content");
        Route::get('delete/{id}', [ContentController::class, 'destroy'])->name("user_delete_content");
        Route::get('show', [ContentController::class, 'show'])->name("user_show_content");
    });

    Route::prefix('image')->group(function () {
        Route::get('create/{contentId}', [\App\Http\Controllers\ImageController::class, 'create'])->name("user_add_image");
        Route::post('store/{contentId}', [\App\Http\Controllers\ImageController::class, 'store'])->name("user_store_image");
        Route::get('delete/{imageId}/{contentId}', [\App\Http\Controllers\ImageController::class, 'destroy'])->name("user_delete_image");
        Route::get('show', [\App\Http\Controllers\ImageController::class, 'show'])->name("user_show_image");
    });
    Route::prefix('payment')->group(function () {
        Route::get('/', [\App\Http\Controllers\PaymentController::class, 'index'])->name("user_payment");
        Route::get('create/{contentId}', [\App\Http\Controllers\PaymentController::class, 'create'])->name("user_create_payment");
        Route::post('store', [\App\Http\Controllers\PaymentController::class, 'store'])->name("user_store_payment");
        Route::get('edit/{id}', [\App\Http\Controllers\PaymentController::class, 'edit'])->name("user_edit_payment");
        Route::post('update/{id}', [\App\Http\Controllers\PaymentController::class, 'update'])->name("user_update_payment");
        Route::get('delete/{id}', [\App\Http\Controllers\PaymentController::class, 'destroy'])->name("user_delete_payment");
        Route::get('show', [\App\Http\Controllers\PaymentController::class, 'show'])->name("user_show_payment");
    });

});



Route::get('/content/{id}/{title}', [HomeController::class, 'content'])->name("contentVisit");
Route::get('/menucontent/{id}/{title}', [HomeController::class, 'menuContent'])->name("menucontent");
Route::post('/getcontent', [HomeController::class, 'getContent'])->name('getContent');
Route::get('/contentlist/{search}', [HomeController::class, 'contentList'])->name('contentList');


Route::get('myreview', [HomeController::class, 'listReview'])->name("myreview");
Route::get('myreview/delete/{id}', [HomeController::class, 'deleteReview'])->name("reviewdelete");





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
    Route::post('menu/update/{id}', [\App\Http\Controllers\admin\MenuController::class, 'update'])->name("menuUpdate");
    Route::get('menu/delete/{id}', [\App\Http\Controllers\admin\MenuController::class, 'destroy'])->name("menuDelete");
    Route::get('menu/show', [\App\Http\Controllers\admin\MenuController::class, 'show'])->name("menuShow");

    // admin/content
    Route::prefix('content')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\ContentController::class, 'index'])->name("content");
        Route::get('add', [\App\Http\Controllers\admin\ContentController::class, 'add'])->name("contentAdd");
        Route::post('store', [\App\Http\Controllers\admin\ContentController::class, 'store'])->name("contentStore");
        Route::get('edit/{id}', [\App\Http\Controllers\admin\ContentController::class, 'edit'])->name("contentEdit");
        Route::post('update/{id}', [\App\Http\Controllers\admin\ContentController::class, 'update'])->name("contentUpdate");
        Route::get('delete/{id}', [\App\Http\Controllers\admin\ContentController::class, 'destroy'])->name("contentDelete");
        Route::get('show', [\App\Http\Controllers\admin\ContentController::class, 'show'])->name("contentShow");
    });

    // admin/image
    Route::prefix('image')->group(function () {
        Route::get('add/{contentId}', [\App\Http\Controllers\admin\ImageController::class, 'add'])->name("imageAdd");
        Route::post('store/{contentId}', [\App\Http\Controllers\admin\ImageController::class, 'store'])->name("imageStore");
        Route::get('delete/{imageId}/{contentId}', [\App\Http\Controllers\admin\ImageController::class, 'destroy'])->name("imageDelete");
        Route::get('show', [\App\Http\Controllers\admin\ImageController::class, 'show'])->name("imageShow");
    });

    // admin/setting
    Route::get('setting', [\App\Http\Controllers\admin\SettingController::class, 'edit'])->name("settingEdit");
    // admin/setting/update
    Route::post('setting/update/{id}', [\App\Http\Controllers\admin\SettingController::class, 'update'])->name("settingUpdate");

    // admin/message
    Route::prefix('message')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\MessageContorller::class, 'index'])->name("message");
    Route::get('edit/{id}', [\App\Http\Controllers\admin\MessageContorller::class, 'edit'])->name("messageEdit");
    Route::post('update/{id}', [\App\Http\Controllers\admin\MessageContorller::class, 'update'])->name("messageUpdate");
    Route::get('delete/{id}', [\App\Http\Controllers\admin\MessageContorller::class, 'destroy'])->name("messageDelete");
    Route::get('show', [\App\Http\Controllers\admin\MessageContorller::class, 'show'])->name("messageShow");
    });

    // admin/review
    Route::prefix('review')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\ReviewController::class, 'index'])->name("review");
        Route::get('edit/{id}', [\App\Http\Controllers\admin\ReviewController::class, 'edit'])->name("reviewEdit");
        Route::post('update/{id}', [\App\Http\Controllers\admin\ReviewController::class, 'update'])->name("reviewUpdate");
        Route::get('show', [\App\Http\Controllers\admin\ReviewController::class, 'show'])->name("reviewShow");
    });
    //admin/faq
    Route::prefix('faq')->group(function () {
        Route::get('/', [\App\Http\Controllers\admin\FaqController::class, 'index'])->name("admin_faq");
        Route::get('add', [\App\Http\Controllers\admin\FaqController::class, 'create'])->name("admin_faq_add");
        Route::post('store', [\App\Http\Controllers\admin\FaqController::class, 'store'])->name("admin_faq_store");
        Route::get('edit/{id}', [\App\Http\Controllers\admin\FaqController::class, 'edit'])->name("admin_faq_edit");
        Route::post('update/{id}', [\App\Http\Controllers\admin\FaqController::class, 'update'])->name("admin_faq_update");
        Route::get('delete/{id}', [\App\Http\Controllers\admin\FaqController::class, 'destroy'])->name("admin_faq_delete");
        Route::get('show', [\App\Http\Controllers\admin\FaqController::class, 'show'])->name("admin_faq_show");
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




