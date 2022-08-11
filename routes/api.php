<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Produit
Route::get('produit/getAll', [\App\Http\Controllers\produitController::class, 'getAll']);
Route::post('produit/addProd', [\App\Http\Controllers\produitController::class, 'addProd']);
Route::post('produit/updateProd/{id}', [\App\Http\Controllers\produitController::class, 'updateProd']);
Route::get('produit/getProduitById/{id}', [\App\Http\Controllers\produitController::class, 'getProduitById']);

// Entree
Route::get('entree/getAll', [\App\Http\Controllers\entreeController::class, 'getAll']);
Route::get('entree/getEntreeById/{id}', [\App\Http\Controllers\entreeController::class, 'getEntreeById']);
Route::post('entree/updateEntree/{id}', [\App\Http\Controllers\entreeController::class, 'updateEntree']);
Route::post('entree/addEntree', [\App\Http\Controllers\entreeController::class, 'addEntree']);



