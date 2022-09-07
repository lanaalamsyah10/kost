<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\SuperAdminController;

use App\Http\Controllers\GoogleController;


Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Kosan banguntapan",
        "email" => "kosanbantul@gmail.com",
        "image" => "kost.jpg"
    ]);
});



Route::get('/blog', [PostController::class, 'index']);


Route::get('/posts', [PostController::class, 'index']);


// halaman singel post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/posts/{categories:slug}', [AdminCategoryController::class, 'show']);

route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


Route::get(
    '/login',
    [LoginController::class, 'index']
)->name('login')->middleware('guest');
Route::post(
    '/login',
    [LoginController::class, 'authenticate']
);
Route::post(
    '/logout',
    [LoginController::class, 'logout']
);

// Route::get(
//     '/login/pemilik',
//     [LoginAdminController::class, 'index']
// );
// Route::post(
//     '/login',
//     [LoginController::class, 'authenticate']
// );

Route::get(
    '/register',
    [RegisterController::class, 'index']
)->middleware('guest');
Route::post(
    '/register',
    [RegisterController::class, 'store']
);

Route::get(
    '/dashboard',
    function () {
        return view('dashboard.index');
    }
)->middleware(['auth', 'admin']);

Route::get(
    '/dashboard/posts/checkSlug',
    [DashboardPostController::class, 'checkSlug']
)->middleware('auth');
Route::get(
    '/dashboard/categories/checkSlug',
    [AdminCategoryController::class, 'checkSlug']
)->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)
    ->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)
    ->middleware('admin');
Route::resource('/dashboard/admin', SuperAdminController::class)->middleware('auth');

Route::get('/maps', [GoogleController::class, 'index'])->name('index');
