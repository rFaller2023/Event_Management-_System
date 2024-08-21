<?php

use App\Http\Controllers\AttendController;
use App\Http\Controllers\AttendeesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Models\Attendees;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('users');

// Route::resource('user', UserController ::class);

Route::resource('user', UserController::class);
Route::resource('event', EventController::class);
Route::resource('attend', AttendController::class);
