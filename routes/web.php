<?php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\purchaseController;
use App\Http\Controllers\transactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('item-records')->group(function () {
  Route::get('item', [ItemController::class, 'itemRead'])->name('item');
});

Route::prefix('item-menu')->group(function () {
  Route::get('product', [purchaseController::class, 'product'])->name('product');
  Route::get('purchase', [transactionController::class, 'purchase'])->name('purchase');
  Route::get('dashboard', [purchaseController::class, 'dashboard'])->name('dashboard');
});

Route::prefix('add-update')->group(function () {
  Route::get('addProduct', [ItemController::class, 'addProduct'])->name('addProduct');
  Route::get('editRead/{id}', [ItemController::class, 'editRead'])->name('editRead');
  Route::get('saveUpdate/{id}', [ItemController::class, 'saveUpdate'])->name('saveUpdate');
  Route::delete('itemDelete/{id}', [ItemController::class, 'delete'])->name('itemDelete');
  Route::post('addCategory', [ItemController::class, 'addCategory'])->name('addCategory');
  Route::post('subtract', [transactionController::class, 'subtract'])->name('subtract');
  Route::get('clear_session', [transactionController::class, 'clear_session'])->name('clear_session');
});
