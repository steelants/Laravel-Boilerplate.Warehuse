<?php

use Illuminate\Support\Facades\Route;
use SteelAnts\LaravelBoilerplate\Warehouse\Http\Controllers\ItemController;
use SteelAnts\LaravelBoilerplate\Warehouse\Http\Controllers\InventoryController;
use SteelAnts\LaravelBoilerplate\Warehouse\Http\Controllers\SellerController;

Route::middleware(['web'])
    ->prefix('admin/stock')
    ->as('admin.stock.')
    ->group(function () {
        Route::get('/items', [ItemController::class, 'index'])->name('items');
        Route::get('/items/{item}', [ItemController::class, 'show'])->name('item.detail');

        Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories');
        Route::get('/sellers', [SellerController::class, 'index'])->name('sellers');

        // Simple placeholder for stock processing page referenced in views
        Route::get('/process', function () {
            return response()->view('boilerplate-warehouse::inventory.index');
        })->name('process');
    });

