<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BasketController;

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

/* Route::get('/', function () {
    return view('welcome');
}) */;

Route::get('/a', function() {
   echo "<h1> admin</h1>";
})->middleware('admin');
Route::get('/', [BookController::class, 'index']);


Route::post('/zakaz/ajaxRequest', 
   [BasketController::class, 'add']);
//   ->name('ajaxRequest.post'); 
//Route::get('/registration', [ReaderController::class, 'create']);
Route::get('/book/order', 
   [BasketController::class, 'order']);
Route::get('/book/order/delete/{id}', 
   [BasketController::class, 'delete']);



Route::get('/book/{id}', 
   [BookController::class, 'show']);
Route::get('/basket/{id}', 
   [BookController::class, 'show']);
Route::get('/registration', 
   [RegisterController::class, 'create']);
Route::get('/login', 
   [LoginController::class, 'create']);
Route::get('/logout', 
   [LoginController::class, 'logout']);
Route::post('/login', 
   [LoginController::class, 'login']);
Route::post('/registration', 
   [RegisterController::class, 'store']);
