<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SkillController;

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





Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Portfolio
Route::get('/portfolio/list', [PortfolioController::class, 'index'])->name('portfolioIndex');
Route::get('/portfolio/add', [PortfolioController::class, 'create'])->name('portfolioCreate');
Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolioStore');
Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolioEdit');
Route::post('/portfolio/update', [PortfolioController::class, 'update'])->name('portfolioUpdate');
Route::get('/portfolio/show/{id}', [PortfolioController::class, 'show'])->name('portfolioShow');
Route::get('/portfolio/destroy/{id}', [PortfolioController::class, 'destroy'])->name('portfolioDestroy');

// Skill
Route::get('/skill', [SkillController::class, 'index'])->name('skillIndex');
Route::get('/skill/add', [SkillController::class, 'create'])->name('skillCreate');
Route::post('/skill/store', [SkillController::class, 'store'])->name('skillStore');