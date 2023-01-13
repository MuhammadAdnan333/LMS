<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;

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
Route::get('signup',[SignupController::class,'signup_form']);
Route::POST('create',[SignupController::class,'insert'])->name('create');
Route::view('login','login');
Route::view('profile','profile');
Route::post('user',[SignupController::class,'login']);
Route::get('/login',function() { 
            if(session()->has('user'))
            {
                return redirect('profile');
            }
            return view('login');
            });
Route::get('/logout',function() {
             if(session()->has('user'))
             {
                session()->pull('user');
             }
            return redirect('login');
         });       