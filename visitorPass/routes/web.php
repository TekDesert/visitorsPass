<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\HomeController;

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

//--- NOT CONNECTED USERS ----
Route::get('/', [IndexController::class, 'index'])->name("index"); //->name(String) : name a route
Route::get('/register', [IndexController::class, 'register'])->name('register');


Route::post('/register', [IndexController::class, 'registerUser'])->name('registerUser');

Route::post('/login', [AuthentificationController::class, 'loginUser'])->name("loginUser"); //->middleware("guest") to add a middleware directly
Route::get('/logout', [AuthentificationController::class, 'logout'])->name('logout');

//--- CONNECTED USERS ----
Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
Route::get('/meeting', [HomeController::class, 'meeting'])->name('meeting');
Route::post('/meetingpost', [HomeController::class, 'meetingPost'])->name('meetingPost');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
//Route::get('/messages', [HomeController::class, 'messages'])->name('messages');
