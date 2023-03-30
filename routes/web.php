<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserControllerResource;
use App\Models\Product;
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

Route::prefix('/manager')->group(function () {
    Route::prefix('/users')->group(function () {
        Route::get('/', [UserControllerResource::class, 'index'])->name('user-list');
        Route::get('/edit/{id}', [UserControllerResource::class, 'edit'])->name('user-edit');
        Route::post('/update/{id}', [UserControllerResource::class, 'update'])->name('user-update');
        Route::get('/clone/{id}', [UserControllerResource::class, 'clone'])->name('user-clone');
        Route::get('/delete/{id}', [UserControllerResource::class, 'delete'])->name('user-delete');
    });
    Route::prefix('/posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post-list');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post-edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('post-update');
        Route::get('/clone/{id}', [PostController::class, 'clone'])->name('post-clone');
        Route::get('/update-mass', [PostController::class, 'update_mass'])->name('post-update-mass-user');
        Route::get('/check-change/{id}', [PostController::class, 'check_change'])->name('post-check');
    });

    Route::get('/test', function () {
        $pro = Product::find(11);
        dd($pro->product_tag);
    });
});



require __DIR__.'/auth.php';
