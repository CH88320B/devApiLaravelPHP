<?php
use App\Http\Controllers\PolizaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// RUTA PÚBLICA
Route::get('polizas', [PolizaController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('polizas', [PolizaController::class, 'store']);
    Route::get('polizas/{id}', [PolizaController::class, 'show']);
    Route::put('polizas/{id}', [PolizaController::class, 'update']);
    Route::delete('polizas/{id}', [PolizaController::class, 'destroy']);
});

