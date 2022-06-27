<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnounceController;

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

// Rotte pubbliche
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/category/{category}/', [PublicController::class, 'announceByCategory'])->name('category.announces');
Route::get('/category/show/{announce}/', [PublicController::class, 'show'])->name('category.show');
Route::get('/search',[PublicController::class, 'search'])->name('search');


// Rotte Annuncio
Route::get('/announce/create', [AnnounceController::class, 'create'])->name('announce.create');
Route::post('/announce/images/upload', [AnnounceController::class, 'uploadImage'])->name('announce.images.upload');
Route::delete('/announce/images/remove', [AnnounceController::class, 'removeImages'])->name('announce.images.remove');
Route::get('/announce/images', [AnnounceController::class, 'getImages'])->name('announce.images');
Route::post('/announce/store', [AnnounceController::class, 'store'])->name('announce.store');
Route::get('/announce/index', [AnnounceController::class, 'index'])->name('announce.index');


// Rotte Revisori
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.home');
Route::post('/revisor/announce/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announce/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::post('/revisor/undo', [RevisorController::class, 'undo'])->name('revisor.undo');


// Rotte Contatti

Route::get('/contactUs', [PublicController::class, 'contactUs'])->name('contactUs');
Route::post('/contactUs/submit', [PublicController::class, 'contactSubmit'])->name('contactUs.submit');

// Rotte per le lingue

Route::post('/locale/{locale}', [PublicController::class, ('locale')])->name('locale');