<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/categorie/add', [App\Http\Controllers\categorieController::class, 'add'])->name('addcategorie');
Route::get('/categorie/list', [App\Http\Controllers\categorieController::class, 'list'])->name('listcategorie');
Route::post('/categorie/persist', [App\Http\Controllers\categorieController::class, 'persist'])->name('persistcategorie');


Route::get('/produit/add', [App\Http\Controllers\produitController::class, 'add'])->name('addproduit');
Route::get('/produit/list', [App\Http\Controllers\produitController::class, 'list'])->name('listproduit');
Route::post('/produit/persist', [App\Http\Controllers\produitController::class, 'persist'])->name('persistproduit');


Route::get('/entree/add', [App\Http\Controllers\entreeController::class, 'add'])->name('addentree');
Route::get('/entree/list', [App\Http\Controllers\entreeController::class, 'list'])->name('listentree');
Route::post('/entree/persist', [App\Http\Controllers\entreeController::class, 'persist'])->name('persistentree');

Route::get('/sortie/add', [App\Http\Controllers\sortieController::class, 'add'])->name('addsortie');
Route::get('/sortie/list', [App\Http\Controllers\sortieController::class, 'list'])->name('listsortie');
Route::post('/sortie/persist', [App\Http\Controllers\sortieController::class, 'persist'])->name('persistsortieproduit');




