<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//? Create
Route::get('/crea/annuncio', [AdController::class, 'create'])->name('ads.create');
Route::post('/salva/annuncio', [AdController::class, 'store'])->name('ads.store');
