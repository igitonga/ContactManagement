<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\GroupController;

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


Route::get('/', [ContactsController::class, 'getAll']);

Route::post('/create/contact', [ContactsController::class, 'create'])->name('contact.create');
Route::post('/edit/contact', [ContactsController::class, 'edit'])->name('contact.edit');
Route::get('/details/{id}', [ContactsController::class, 'view']);
Route::get('/delete/{id}', [ContactsController::class, 'delete']);

Route::post('/create/group', [GroupController::class, 'create'])->name('contact.group');
Route::get('/group/delete/{id}', [GroupController::class, 'delete']);