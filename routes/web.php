<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\initializerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['initialized'])->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create']);

    // TODO: should have guest route
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['uninitialized'])->name('initialize')->group(function () {
    Route::get('/initialize', function () {
        return view('auth.initialize');
    });

    Route::post('/initialize', initializerController::class);
});

Route::middleware(['auth', 'initialized'])->group(function () {
    Route::get('product/import', [ProductController::class, 'createImport'])->name('product.create.import');
    Route::post('product/import', [ProductController::class, 'storeImport'])->name('product.store.import');
    Route::get('product/import/template', [ProductController::class, 'template'])->name('product.import.template');
    Route::resource('product', ProductController::class);
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
