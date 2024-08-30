<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use App\Models\Attendees;
use App\Models\RegisterController;
use Illuminate\Support\Facades\Route;


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

Route::get('/login', function (){
    return view('login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [HomeController::class, 'index']);


// Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('users');

// Route::resource('user', UserController ::class);
Route::get('/login', function () { return view('auth.login'); });
Route::get('/register', function () { return view('auth.register'); });

Route::resource('user', UserController::class);
Route::resource('event', EventController::class);
Route::resource('venue', VenueController::class);
Route::resource('attendee', AttendeeController::class);
Route::resource('organizer', OrganizerController::class);
Route::resource('schedule', ScheduleController::class);
Route::resource('ticket', TicketController::class);



// Route::get('/login', [LoginController::class, 'loginUser']);
Route::get('/wait', function(){
    return view('auth.waitResponse');
});


