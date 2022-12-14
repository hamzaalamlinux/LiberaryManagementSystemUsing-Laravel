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

/** Authorizarion admin role */
Route::middleware('role:admin')->group(function(){
     Route::get('/AddBooksFrom' , function(){
        return view('layouts.pages.Dashboard.Books.AddBooks');
     });
    Route::post('/AddBooks' , [AddBooksController::class  , 'AddBooks'])->name('AddBooks');

    Route::get('/PendingRequest'  , [\App\Http\Controllers\Books\PendingBooksController::class , 'GetBooksPendingRequest']);

    Route::post('/UpdateRequest' , [\App\Http\Controllers\Books\UpdatePendingrequestController::class , 'UpedateBookRequest'])->name('UpedateBookRequest');

    Route::get('/GetUsers' , [App\Http\Controllers\Users\UsersController::class , 'GetUsers']);

    Route::get('/AddUserForm' , function (){
       return view('layouts.pages.Dashboard.Users.AddUserForm');
    });

     Route::post('/AddUsers' , [\App\Http\Controllers\Users\AddUsersController::class , 'AddUsers']);

     Route::post('/DeleteUser' , [\App\Http\Controllers\Users\DeleteUserController::class , 'Delete']);

     Route::get('/Role' , [\App\Http\Controllers\Roles\RoleControlelr::class , 'GetRoles'])->name('GetRoles');

     Route::post('/AddRole' , [\App\Http\Controllers\Roles\AddRoleController::class , 'AddRole']);

    Route::get('/GetPanelty' , [\App\Http\Controllers\Panelty\GetPaneltyController::class , 'GetPanelties']);

    Route::post('/UpdatePanelties' ,[\App\Http\Controllers\Panelty\UpdatePaneltyController::class , 'Update']);
});


    /** Authorizarion user role */
Route::middleware('role:user')->group(function(){

    Route::get('/GetBooks' , [\App\Http\Controllers\Books\BooksListController::class , 'GetBooks']);

    Route::get('/BooksRequest' , [\App\Http\Controllers\Books\BooksRequestController::class , 'GetBooksRequest']);

    Route::post('AddBookRequest' , [\App\Http\Controllers\Books\AddBookRequestController::class , 'AddRequest'])->name('AddRequest');

    Route::get('/Panelty' ,[\App\Http\Controllers\Panelty\PaneltyController::class , 'GetPanelties']);
});

    Route::get('/logout' , [\App\Http\Controllers\Logout\LogoutController::class , 'Logout']);

});
