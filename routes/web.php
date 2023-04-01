<?php

use App\Http\Controllers\dashboard\AuthController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TwilioSMSController;
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

Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('sendSMS', [TwilioSMSController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);

//Route::group(['prefix'=>'user'],function (){
//    Route::get('', [UserController::class, 'index'])->name('user');
//    Route::post('store', [UserController::class, 'store'])->name('user.store');
//    Route::post('store', [UserController::class, 'store'])->name('user.destroy');
//
//});
});
