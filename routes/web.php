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

Route::get('/stages_of_execution', action: [App\Http\Controllers\WebController::class, 'stages_of_execution'])->name('stages_of_execution');

Route::post('/add_stage_of_execution', action: [App\Http\Controllers\WebController::class, 'add_stage_of_execution'])->name('add_stage_of_execution');
Route::post('/edit_stage_of_execution', action: [App\Http\Controllers\WebController::class, 'edit_stage_of_execution'])->name('edit_stage_of_execution');
Route::delete('/del_stage_of_execution', action: [App\Http\Controllers\WebController::class, 'del_stage_of_execution'])->name('del_stage_of_execution');

Route::get('/types_of_contracts', action: [App\Http\Controllers\WebController::class, 'types_of_contracts'])->name('types_of_contracts');

Route::post('/add_type_of_contract', action: [App\Http\Controllers\WebController::class, 'add_type_of_contract'])->name('add_type_of_contract');
Route::post('/edit_type_of_contract', action: [App\Http\Controllers\WebController::class, 'edit_type_of_contract'])->name('edit_type_of_contract');
Route::delete('/del_type_of_contract', action: [App\Http\Controllers\WebController::class, 'del_type_of_contract'])->name('del_type_of_contract');
