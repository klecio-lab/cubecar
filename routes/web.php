<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\AnuncioController;

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

Route::get('/login-view', [userController::class, 'loginView'])->name('login.view');
Route::get('/register-view', [userController::class, 'registerView'])->name('register.view');

Route::post('/login', [userController::class, 'login'])->name('login');
Route::post('/register', [userController::class, 'register'])->name('register');



Route::middleware(['auth'])->group(function () {
    Route::get('listar-anuncio', [AnuncioController::class, 'listar']);
    Route::post('criar-anuncio', [AnuncioController::class, 'create'])->name('createAnuncio');
    Route::post('logout', [AnuncioController::class, 'logout'])->name('logout');
});
