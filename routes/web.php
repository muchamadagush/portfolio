<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolioIndex');
Route::get('/portfolio/add', [PortfolioController::class, 'create'])->name('portfolioCreate');
Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolioStore');
Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolioEdit');
Route::post('/portfolio/update', [PortfolioController::class, 'update'])->name('portfolioUpdate');
Route::get('/portfolio/show/{id}', [PortfolioController::class, 'show'])->name('portfolioShow');
Route::get('/portfolio/destroy/{id}', [PortfolioController::class, 'destroy'])->name('portfolioDestroy');