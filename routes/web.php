<?php

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

use App\Http\Controllers\User\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
