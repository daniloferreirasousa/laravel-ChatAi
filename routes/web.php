<?php

use App\Http\Controllers\CopyController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredienteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/ingredientes', [IngredienteController::class, 'index']);
Route::post('/ingredientes', [IngredienteController::class, 'ingredientesAcao'])->name('ingredientesAcao');

Route::get('/copy', [CopyController::class, 'index']);
Route::post('/copy', [CopyController::class, 'copyAcao'])->name('copyAcao');

Route::get('/generic', [GenericController::class, 'index']);
Route::post('/generic', [GenericController::class, 'genericAcao'])->name('genericAcao');