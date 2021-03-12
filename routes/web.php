<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PagesController::class, 'index'])->name('main');

Route::resources([
    'posts' => PostsController::class,
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('CheckUserRole');
Route::put('/admin/{id}approve/', [AdminController::class, 'update'])->name('approve')->middleware('CheckUserRole');
Route::delete('/admin/{id}/delete', [AdminController::class, 'destroy'])->name('delete')->middleware('CheckUserRole');

Route::post('/post/{id}', [CommentsController::class, 'store'])->name('storeComment');