<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitarController;
use App\Http\Controllers\UsuariosController;

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

    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/panel', [UsuariosController::class, 'index'])->name('panel');
    Route::post('/weblogin', [UsuariosController::class, 'weblogin'])->name('weblogin'); 
    Route::get('/logout', [UsuariosController::class, 'logout']);

    Route::get('/exportPDF', [SolicitarController::class, 'exportPDF']);
    Route::get('/exportExcel', [SolicitarController::class, 'exportExcel']);
