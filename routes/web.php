<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::view('/', 'welcome');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::apiResource('/url', UrlController::class);
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/password/reset', [ResetPasswordController::class, 'reset']);
// Route::get('/password/reset/{token}');

// Route::get('u/{url}', [UrlController::class, 'show']);
Route::any('{url}', function () {
    return view('welcome');
})->where('url', '.*');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('password/reset/{token}', function () {
    return '';
})->name('password.reset');
