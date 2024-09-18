<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\StockTransferController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\WarehousesController;
use App\Http\Middleware\confirmPassword;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';
require __DIR__ . '/finance.php';
require __DIR__ . '/purchase.php';
require __DIR__ . '/stock.php';
require __DIR__ . '/sale.php';
require __DIR__ . '/reports.php';
require __DIR__ . '/quot.php';

Route::middleware('auth')->group(function () {

    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');

    Route::resource('units', UnitsController::class);
    Route::resource('product', ProductsController::class);

    Route::resource('warehouses', WarehousesController::class);
    Route::resource('stockTransfer', StockTransferController::class);

    Route::get("stockTransfer/delete/{id}", [StockTransferController::class, 'destroy'])->name('stockTransfer.delete')->middleware(confirmPassword::class);

});


