<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('menu');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/edit-form/{id}', [ProductController::class, 'getEditForm']);
Route::get('/edit-form', [ProductController::class, 'getEditForm']);

Route::get('/product-display/{id}', [ProductController::class, 'getProductDisplay']);

Route::get('/products', [ProductController::class, 'products']);
Route::resource('product', ProductController::class);

Route::get('/product-types', [ProductController::class, 'productTypes']);
Route::get('/avaiable-images', [ProductController::class, 'avaiableImages']);

Route::get('/run-migrations', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return 'Migrations executed successfully: <br><pre>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Error running migrations: ' . $e->getMessage();
    }
});