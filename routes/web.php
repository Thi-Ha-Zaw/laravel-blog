<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//for guest user routes
Route::controller(PageController::class)->group(function(){
    Route::get("/","index")->name("index");
    Route::get("/article/{slug}","show")->name("detail");
    Route::get("/category/{slug}","categorized")->name("categorized");
});

Auth::routes(['verify'=>true]);

//for auth user routes
Route::resource("comment",CommentController::class)->only(["store","update","destroy"])->middleware(["auth",'verified']);

Route::middleware(['auth','verified'])->prefix("dashboard")->group(function () {

    Route::resource("article", ArticleController::class);
    Route::resource("category", CategoryController::class)->middleware("can:viewAny," . Category::class);
    // Route::resource("category", CategoryController::class)->middleware("can:viewAny,". Category::class);
    Route::resource("photo",PhotoController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/users', [HomeController::class, "users"])->name("users")->can("admin-only");

});

//for admin user routes
Route::middleware(['auth','admin'])->group(function () {
    Route::post('users/{user}/ban', [AdminController::class, 'banUser'])->name('admin.banUser');
    Route::post('users/{user}/recall', [AdminController::class, 'recallUser'])->name('admin.recallUser');
});
