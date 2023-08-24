<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can  register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/phone', [PhoneController::class, 'index'])->name('phone.index');
Route::get('/phone/create', [PhoneController::class, 'create'])->name('phone.create');
Route::post('/phone', [PhoneController::class, 'store'])->name('phone.store');
Route::get('/phone/{phone}/edit', [PhoneController::class, 'edit'])->name('phone.edit');
Route::put('/phone/{phone}/update', [PhoneController::class, 'update'])->name('phone.update');
Route::delete('/phone/{phone}/delete', [PhoneController::class, 'delete'])->name('phone.delete');


Route::get('/search', [PhoneController::class, 'search'])->name('phone.search');
Route::get('/sort', [PhoneController::class, 'sort'])->name('phone.sort');






//Route::get('/search','PhoneController@search');
//Route::get('phone/{phone}/edit', 'PhoneController@edit')->name('phone.edit');

