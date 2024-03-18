<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SolicitarController;
use App\Http\Controllers\UsuariosController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UsuariosController::class, 'usuarios']);
Route::get('/solicit', [SolicitarController::class, 'solicitaciones']);
Route::post('/nuevaSolicitacion', [SolicitarController::class, 'nuevaSolicitacion']);

Route::post('/login', [UsuariosController::class, 'login']);
Route::post('/nuevoUsuario', [UsuariosController::class, 'nuevoUsuario']);