<?php

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

Route::get('/', action: [App\Http\Controllers\WebController::class, 'index'])->name('index');

Route::get('/vat_rates', action: [App\Http\Controllers\WebController::class, 'vat_rates'])->name('vat_rates');

Route::post('/add_vat_rate', action: [App\Http\Controllers\WebController::class, 'add_vat_rate'])->name('add_vat_rate');
Route::post('/edit_vat_rate', action: [App\Http\Controllers\WebController::class, 'edit_vat_rate'])->name('edit_vat_rate');
Route::delete('/del_vat_rate', action: [App\Http\Controllers\WebController::class, 'del_vat_rate'])->name('del_vat_rate');


