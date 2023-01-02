<?php

use App\Models\Attribute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\initializerController;
use App\Http\Controllers\SaleProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

    Route::delete('product/{product}/attribute/{attribute}', [AttributeController::class, 'destroy'])->name('product.attribute.destroy')->scopeBindings();
    Route::get('product/{product}/attribute/{attribute}/edit', [AttributeController::class, 'edit'])->name('product.attribute.edit')->scopeBindings();
    Route::post('product/{product}/attribute/{attribute}', [AttributeController::class, 'update'])->name('product.attribute.update')->scopeBindings();
    Route::get('product/{product}/attribute/create', [AttributeController::class, 'create'])->name('product.attribute.create')->scopeBindings();
    Route::post('product/{product}/attribute', [AttributeController::class, 'store'])->name('product.attribute.store')->scopeBindings();
    // Route::resource('product.attribute', Attribute::class);

    Route::resource('sale', SaleController::class);

    Route::get('/sale/{sale}/product', [SaleProductController::class, 'index'])->name('sale.product.add');
    Route::post('/sale/{sale}/attribute/{attribute}', [SaleProductController::class, 'store'])->name('sale.product.store');
    Route::post('/sale/{sale}/product', [SaleProductController::class, 'search'])->name('sale.product.search');
    Route::delete('/sale/{sale}/attribute/{attribute}', [SaleProductController::class, 'destroy'])->name('sale.product.remove');
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
