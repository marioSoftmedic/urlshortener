<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('u/{url}', [UrlController::class, 'show']);
Route::view('{url}', 'welcome');
