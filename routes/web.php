<?php

use App\Http\Controllers\BonCommandeFrsController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\LigneCommandeController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/fournisseur', function () {
    return view('Fournisseur.index');
});
Route::get('/produit', function () {
    return view('produit.index');
});
Route::get('/categorie', function () {
    return view('Categorie.index');
});

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/categories', [App\Http\Controllers\CategorieController::class, 'index'])->name('index');

Route::resource('/fournisseur', FournisseurController::class);
Route::any('/search', 'FournisseurController@search')->name('search');
Route::post('/fournisseurSearch', [App\Http\Controllers\FournisseurController::class, 'search'])->name('fournisseurSearch');
Route::post('/categorieSearch', [App\Http\Controllers\CategorieController::class, 'search'])->name('categorieSearch');


Route::resource('/categorie', CategorieController::class);
Route::resource('/famille', FamilleController::class);

Route::resource('/produit', ProduitController::class);
//Route::get('/search', 'ProduitController@search');
Route::resource('/bon_commande_frs', BonCommandeFrsController::class);
Route::resource('/Lignes_commandes', LigneCommandeController::class);
Route::post('/storeLignes_commandes', [App\Http\Controllers\LigneCommandeController::class, 'store'])->name('storeLignes_commandes');
Route::post('/produitSearch', [App\Http\Controllers\ProduitController::class, 'search'])->name('produitSearch');

//les route pour la ligne de commande
//Route::get('/Ligne_commande', [LigneCommandeController::class, 'index']);



