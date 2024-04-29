<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::resource('users', App\Http\Controllers\UserController::class );
Route::resource('books', App\Http\Controllers\BookController::class );

Route::get('/profile', [App\Http\Controllers\UserController::class ,'profile'])->name('profile');
Route::get('/createBook', [App\Http\Controllers\BookController::class, 'create'])->name('createBook');
Route::get('/myBooks', [App\Http\Controllers\UserController::class, 'myBooks'])->name('myBooks');
Route::get('/editBook', [App\Http\Controllers\BookController::class, 'edit'])->name('editBook');
Route::post('/buy/{id?}', [App\Http\Controllers\DogController::class, 'buy'])->name('buy');
Route::get('/details/{id?}', [App\Http\Controllers\DogController::class, 'showDetails'])->name('details');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'cartList']);
Route::post('addToCart/{id}', [App\Http\Controllers\ProductController::class, 'addToCart']);


Route :: middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/books', [UserController::class, 'all_books'])->name('books');
}

);
