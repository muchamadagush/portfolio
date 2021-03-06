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

// Home
Route::get('/', function () {
    return view('dashboard.views.index');
})->name('home');

// Portfolio view user
Route::get('/portfolio', [PortfolioController::class, 'display'])->name('portfolioDisplay');
Route::get('/portfolio/detail/{id}', [PortfolioController::class, 'detail'])->name('portfolioDetail');

// About view user
Route::get('/about', [SkillController::class, 'display'])->name('skillDisplay');

// Contact
Route::get('/contact', function () {
    return view('dashboard.views.contact');
})->name('contact');




// Portfolio
Route::get('/portfolio/list', [PortfolioController::class, 'index'])->name('portfolioIndex');
Route::get('/portfolio/add', [PortfolioController::class, 'create'])->name('portfolioCreate')->middleware('auth');
Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolioStore')->middleware('auth');
Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolioEdit')->middleware('auth');
Route::post('/portfolio/update', [PortfolioController::class, 'update'])->name('portfolioUpdate')->middleware('auth');
Route::get('/portfolio/show/{id}', [PortfolioController::class, 'show'])->name('portfolioShow')->middleware('auth');
Route::get('/portfolio/destroy/{id}', [PortfolioController::class, 'destroy'])->name('portfolioDestroy')->middleware('auth');

// Skill
Route::get('/skill', [SkillController::class, 'index'])->name('skillIndex');
Route::get('/skill/add', [SkillController::class, 'create'])->name('skillCreate')->middleware('auth');
Route::post('/skill/store', [SkillController::class, 'store'])->name('skillStore')->middleware('auth');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blogIndex');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blogCreate')->middleware('auth');
Route::post('/blog/create/images', [BlogController::class, 'contentImage'])->name('blogImage')->middleware('auth');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blogStore')->middleware('auth');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blogEdit')->middleware('auth');
Route::post('/blog/update', [BlogController::class, 'update'])->name('blogUpdate')->middleware('auth');
Route::get('/blog/list', [BlogController::class, 'list'])->name('blogList')->middleware('auth');
Route::get('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blogDestroy')->middleware('auth');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogShow');
Route::post('/blog/comment', [BlogController::class, 'comment'])->name('blogComment');

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('categoryIndex')->middleware('auth');
Route::get('/category/create', [CategoryController::class, 'create'])->name('categoryCreate')->middleware('auth');
Route::post('/category/store', [CategoryController::class, 'store'])->name('categoryStore')->middleware('auth');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('categoryEdit')->middleware('auth');
Route::post('/category/update', [CategoryController::class, 'update'])->name('categoryUpdate')->middleware('auth');
Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('categoryDestroy')->middleware('auth');

Auth::routes();
