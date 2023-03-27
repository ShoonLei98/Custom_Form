<?php

use App\Http\Controllers\CustomFormController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//route for custom form 
Route::resource('/custom_forms', CustomFormController::class);

//route for mailing
Route::get('send-email', [MailController::class, 'index']);

//route for dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
