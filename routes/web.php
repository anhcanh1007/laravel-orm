<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/append', [UserController::class, 'append']);
Route::get('/contains', [UserController::class, 'contains']);
Route::get('/diff', [UserController::class, 'diff']);
Route::get('/except', [UserController::class, 'except']);
Route::get('/fresh', [UserController::class, 'fresh']);
Route::get('/intersect', [UserController::class, 'intersect']);
Route::get('/load', [UserController::class, 'load']);
Route::get('/modelKey', [UserController::class, 'modelKey']);
Route::get('/makeVisible', [UserController::class, 'makeVisible']);
Route::get('/only', [UserController::class, 'only']);
Route::get('/toQuery', [UserController::class, 'toQuery']);
Route::get('/unique', [UserController::class, 'unique']);
Route::get('/replicate', [UserController::class, 'replicate']);

require __DIR__.'/auth.php';
