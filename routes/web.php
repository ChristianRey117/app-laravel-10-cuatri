<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ConfirmadosController;
use App\Http\Controllers\SospechososController;
use App\Http\Controllers\NegativosController;
use App\Http\Controllers\DefuncionesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/estados', EstadoController::class);
Route::resource('/confirmados', ConfirmadosController::class);
Route::resource('/negativos', NegativosController::class);
Route::resource('/sospechosos', SospechososController::class);
Route::resource('/defunciones', DefuncionesController::class);

