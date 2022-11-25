<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'user_view'])->name('users.view');
    Route::get('/add', [UserController::class, 'user_add'])->name('users.add');
    Route::post('/store', [UserController::class, 'user_store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'user_edit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'user_update'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'user_delete'])->name('users.delete');
});

/// User Profile and Change Password 
Route::prefix('profile')->group(function () {
    Route::get('/view', [ProfileController::class, 'profile_view'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'profile_edit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'profile_store'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'password_view'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'password_update'])->name('password.update');
});

