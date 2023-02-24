<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CreditoController;
use App\Models\Cliente;
use App\Models\Credito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\RouteCompiler;

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
    $clientes = Cliente::all()->count();;
    $creditos = Credito::all()->count();;
    return view('welcome',compact('clientes','creditos'));
})->name('welcome');

Route::resource('cliente',ClienteController::class);
Route::resource('credito',CreditoController::class);
