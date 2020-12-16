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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('admin');

Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/send', [App\Http\Controllers\EmailController::class, 'sendPost'])->name('send.post');

Route::prefix('dashboard')->name('admin.')->middleware('admin')->group(function() {
// websites
    Route::get('/websites', [App\Http\Controllers\AdminWebsiteController::class, 'index'])->name('websites.index');
    Route::get('/websites/create', [App\Http\Controllers\AdminWebsiteController::class, 'create'])->name('websites.create');
    Route::post('/websites/store', [App\Http\Controllers\AdminWebsiteController::class, 'store'])->name('websites.store');
    Route::get('/websites/edit/{id}', [App\Http\Controllers\AdminWebsiteController::class, 'edit'])->name('websites.edit');
    Route::post('/websites/update/{id}', [App\Http\Controllers\AdminWebsiteController::class, 'update'])->name('websites.update');
    Route::post('/websites/delete/{id}', [App\Http\Controllers\AdminWebsiteController::class, 'delete'])->name('websites.delete');
});