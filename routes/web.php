<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewController;
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


Route::prefix('/view')->group( function(){
Route::get('/view', [viewController::class, 'view'])->name('view');
Route::post('/insertData', [viewController::class, 'insertData'])->name('insertData');
Route::post('/deleteData/{id}', [viewController::class, 'deleteData'])->name('deleteData');
Route::get('/findData/{id}', [viewController::class, 'findData'])->name('findData');
Route::post('/updateData/{id}', [viewController::class, 'updateData'])->name('updateData');
Route::post('/processString', [viewController::class, 'processString'])->name('processString');

});
