<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ActivityController;
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

Route::get('/dashboard', [ContactController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard/create',[ContactController::class,'create'])->name('contact.create');
Route::post('/dashboard',[ContactController::class,'store'])->name('contact.store');
Route::get('/dashboard/{dashboard}/edit',[ContactController::class,'edit'])->name('contact.edit');

Route::put('/dashboard/{dashboard}',[ContactController::class,'update'])->name('contact.update');

Route::get('/delete/dashboard/{id}',[ContactController::class,'destroy'])->name('contact.destroy');


//tags routes
Route::get('/tag',[TagController::class,'index'])->name('tag.index');

Route::get('/tag/create',[TagController::class,'create'])->name('tag.create');

Route::post('/tag',[TagController::class,'store'])->name('tag.store');

//these routes is for activities

Route::get('/activity',[ActivityController::class,'index'])->name('activity.index');

Route::get('/activity/create',[ActivityController::class,'create'])->name('activity.create');

Route::post('/activity',[ActivityController::class,'store'])->name('activity.store');

Route::get('/activity/{activity}/edit',[ActivityController::class,'edit'])->name('activity.edit');

Route::put('/activity/{activity}',[ActivityController::class,'update'])->name('activity.update');

Route::get('/delete/activity/{id}',[ActivityController::class,'destroy'])->name('activity.destroy');

Route::get('/export',[ContactController::class,'export'])->name('export');
