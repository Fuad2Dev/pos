<?php

use App\Models\Attribute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\AttributeSaleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;

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


Route::redirect('/', '/product');


Route::middleware(['auth', 'initialized'])->group(function () {
    // product resource
    Route::get('product/import', [ProductController::class, 'createImport'])->name('product.create.import');
    Route::post('product/import', [ProductController::class, 'storeImport'])->name('product.store.import');
    Route::get('product/import/template', [ProductController::class, 'template'])->name('product.import.template');
    Route::resource('product', ProductController::class);

    // product attribute resource
    Route::delete('product/{product}/attribute/{attribute}', [ProductAttributeController::class, 'destroy'])->name('product.attribute.destroy')->scopeBindings();
    Route::get('product/{product}/attribute/{attribute}/edit', [ProductAttributeController::class, 'edit'])->name('product.attribute.edit')->scopeBindings();
    Route::post('product/{product}/attribute/{attribute}', [ProductAttributeController::class, 'update'])->name('product.attribute.update')->scopeBindings();
    Route::get('product/{product}/attribute/create', [ProductAttributeController::class, 'create'])->name('product.attribute.create')->scopeBindings();
    Route::post('product/{product}/attribute', [ProductAttributeController::class, 'store'])->name('product.attribute.store')->scopeBindings();

    // sale resource
    Route::resource('sale', SaleController::class);

    // sale attribute resource
    Route::get('/sale/{sale}/attribute', [AttributeSaleController::class, 'index'])->name('sale.attribute.add');
    Route::post('/sale/{sale}/attribute/{attribute}', [AttributeSaleController::class, 'store'])->name('sale.attribute.store');
    Route::post('/sale/{sale}/attribute', [AttributeSaleController::class, 'search'])->name('sale.attribute.search');
    Route::delete('/sale/{sale}/attribute/{attribute}', [AttributeSaleController::class, 'destroy'])->name('sale.attribute.remove');

    // profile resource
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // dashboard
    Route::name('dashboard.')->prefix('/dashboard')->group(function () {
        Route::get('/summary', [DashboardController::class, 'summary'])->name('summary');
        Route::get('/stock', [DashboardController::class, 'stock'])->name('stock');
        Route::post('/stock', [DashboardController::class, 'stock'])->name('stock');
        Route::get('/chart', [DashboardController::class, 'chart'])->name('chart');
    });
});


require __DIR__ . '/auth.php';
