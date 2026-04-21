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

Route::get('/types_of_payments', action: [App\Http\Controllers\WebController::class, 'types_of_payments'])->name('types_of_payments');

Route::post('/add_type_of_payment', action: [App\Http\Controllers\WebController::class, 'add_type_of_payment'])->name('add_type_of_payment');
Route::post('/edit_type_of_payment', action: [App\Http\Controllers\WebController::class, 'edit_type_of_payment'])->name('edit_type_of_payment');
Route::delete('/del_type_of_payment', action: [App\Http\Controllers\WebController::class, 'del_type_of_payment'])->name('del_type_of_payment');

Route::get('/organizations', action: [App\Http\Controllers\WebController::class, 'organizations'])->name('organizations');

Route::post('/add_organization', action: [App\Http\Controllers\WebController::class, 'add_organization'])->name('add_organization');
Route::post('/edit_organization', action: [App\Http\Controllers\WebController::class, 'edit_organization'])->name('edit_organization');
Route::delete('/del_organization', action: [App\Http\Controllers\WebController::class, 'del_organization'])->name('del_organization');

Route::get('/contracts', action: [App\Http\Controllers\WebController::class, 'contracts'])->name('contracts');

Route::post('/add_contract', action: [App\Http\Controllers\WebController::class, 'add_contract'])->name('add_contract');
Route::post('/edit_contract', action: [App\Http\Controllers\WebController::class, 'edit_contract'])->name('edit_contract');
Route::delete('/del_contract', action: [App\Http\Controllers\WebController::class, 'del_contract'])->name('del_contract');

Route::get('/payment', action: [App\Http\Controllers\WebController::class, 'payment'])->name('payment');

Route::post('/add_payment', action: [App\Http\Controllers\WebController::class, 'add_payment'])->name('add_payment');
Route::post('/edit_payment', action: [App\Http\Controllers\WebController::class, 'edit_payment'])->name('edit_payment');
Route::delete('/del_payment', action: [App\Http\Controllers\WebController::class, 'del_payment'])->name('del_payment');
