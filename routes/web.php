<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemUIController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'items'], function () {
    Route::get('/', [ItemUIController::class, 'index'])->name('items.index');
    Route::get('create', [ItemUIController::class, 'create'])->name('items.create');
    Route::post('/', [ItemUIController::class, 'store'])->name('items.store');
    Route::get('{item}/edit', [ItemUIController::class, 'edit'])->name('items.edit');
    Route::put('{item}', [ItemUIController::class, 'update'])->name('items.update');
    Route::delete('{item}', [ItemUIController::class, 'destroy'])->name('items.destroy');
});
