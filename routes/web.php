<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Electricity\BillController;

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

// Route::get('/', );

Route::any('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login', function () {
    return redirect('/');
});
Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');


// Bill management application - CURD (Create,update,read, delete)
Route::get('/bill', [BillController::class, 'index'])->name('bill.index');
Route::get('/bill/create', [BillController::class, 'create'])->name('bill.create');
Route::post('/bill/store', [BillController::class, 'store'])->name('bill.store');
Route::get('/bill/show/{id}', [BillController::class, 'show'])->name('bill.show');
Route::get('/admin/bill/edit/{id}', [BillController::class, 'edit'])->name('bill.edit');
Route::post('/bill/update/{id}', [BillController::class, 'update'])->name('bill.update');
Route::get('/bill/delete/{id}', [BillController::class, 'destroy'])->name('bill.destroy');

// blade templating
Route::get('/template', function () {
    return view('template.page');
});
Route::get('/templatelogin', function () {
    return view('template.login');
});
