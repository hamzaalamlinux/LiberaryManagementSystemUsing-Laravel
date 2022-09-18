<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Books\AddBooksController;
use App\Http\Middleware\authentication;
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
    return view('layouts.index');
});
/** Post request For Login */

Route::post("/login" , [LoginController::class , 'Authentication'])->name('login');

Route::post('/register' ,[\App\Http\Controllers\Register\RegisterController::class ,'Save'])->name('register');

/** Add Middleware For Authentication */

Route::middleware([authentication::class])->group(function(){


Route::get('/dashboard', [LoginController::class , 'Dashboard'])->name('Dashboard');

Route::get('/AddBooksFrom' , function(){
    return view('layouts.pages.Dashboard.AddBooks');
});

Route::post('/AddBooks' , [AddBooksController::class  , 'AddBooks'])->name('AddBooks');

});
