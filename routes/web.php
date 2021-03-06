<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Home page
Route::get('/', function () {
    return view('dashboard.views.index');
})->name('home');

// Portfolio page
Route::get('/portfolio', [PortfolioController::class, 'display'])->name('portfolioDisplay');
Route::get('/portfolio/detail/{id}', [PortfolioController::class, 'detail'])->name('portfolioDetail');

// About page
Route::get('/about', [SkillController::class, 'display'])->name('skillDisplay');

// Contact page
Route::get('/contact', function () {
    return view('dashboard.views.contact');
})->name('contact');

// Blog page
Route::get('/blog', [BlogController::class, 'index'])->name('blogIndex');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogShow');
Route::post('/blog/comment', [BlogController::class, 'comment'])->name('blogComment');

// Middleware Auth
Route::group(['middleware' => 'auth'], function () {

    // Portfolio
    Route::prefix('portfolio')->group(function () {
        Route::get('/list', [PortfolioController::class, 'index'])->name('portfolioIndex');
        Route::get('/add', [PortfolioController::class, 'create'])->name('portfolioCreate');
        Route::post('/store', [PortfolioController::class, 'store'])->name('portfolioStore');
        Route::get('/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolioEdit');
        Route::post('/update', [PortfolioController::class, 'update'])->name('portfolioUpdate');
        Route::get('/show/{id}', [PortfolioController::class, 'show'])->name('portfolioShow');
        Route::get('/destroy/{id}', [PortfolioController::class, 'destroy'])->name('portfolioDestroy');
    });

    //Skill
    Route::prefix('skill')->group(function () {
        Route::get('/', [SkillController::class, 'index'])->name('skillIndex');
        Route::get('/add', [SkillController::class, 'create'])->name('skillCreate');
        Route::post('/store', [SkillController::class, 'store'])->name('skillStore');
    });

    // Blog
    Route::prefix('blog')->group(function () {
        Route::get('/create', [BlogController::class, 'create'])->name('blogCreate');
        Route::post('/create/images', [BlogController::class, 'contentImage'])->name('blogImage');
        Route::post('/store', [BlogController::class, 'store'])->name('blogStore');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blogEdit');
        Route::post('/update', [BlogController::class, 'update'])->name('blogUpdate');
        Route::get('/list', [BlogController::class, 'list'])->name('blogList')->middleware('auth');
        Route::get('/destroy/{id}', [BlogController::class, 'destroy'])->name('blogDestroy');
    });

    // Category
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categoryIndex');
        Route::get('/create', [CategoryController::class, 'create'])->name('categoryCreate');
        Route::post('/store', [CategoryController::class, 'store'])->name('categoryStore');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('categoryEdit');
        Route::post('/update', [CategoryController::class, 'update'])->name('categoryUpdate');
        Route::get('/destroy/{category}', [CategoryController::class, 'destroy'])->name('categoryDestroy');
    });
});
