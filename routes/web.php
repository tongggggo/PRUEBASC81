<?php

use Illuminate\Support\Facades\Route;

class App extends Illuminate\Support\Facades\App {}
class Artisan extends Illuminate\Support\Facades\Artisan {}
class Auth extends Illuminate\Support\Facades\Auth {}


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('clientes',App\Http\Controllers\ClienteController::class);
Route::resource('pedidos',App\Http\Controllers\PedidoController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
