<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

// Route::get('/', function () {
//     return view('home.home');
// });


Route::get('/', [\App\Http\Controllers\FrontController::class,'index']);


Route::get('/restaurant', [\App\Http\Controllers\FrontController::class,'restaurant']);
Route::get('/restaurant/menu/{id}', [\App\Http\Controllers\FrontController::class,'menu']);
Route::post('/restaurant/menu/{id}/{rest}', [\App\Http\Controllers\FrontController::class,'produitadd']);

Route::get('/livreur/commande', [\App\Http\Controllers\FrontController::class,'commande_livreur']);
Route::post('/livreur/commande/{id}', [\App\Http\Controllers\FrontController::class,'proposition']);
Route::get('/livreur/commande/{id}', [\App\Http\Controllers\FrontController::class,'proposition']);
Route::get('/livreur/commande-acceptées', [\App\Http\Controllers\FrontController::class,'commande_acceptées_livreur']);


Route::get('/commande/proposition/{id}', [\App\Http\Controllers\FrontController::class,'proposition_client']);

Route::get('/commande/detail/{id}', [\App\Http\Controllers\FrontController::class,'detail_commande_client']);
Route::get('/commande/detail-restaurant/{id}', [\App\Http\Controllers\FrontController::class,'detail_commande_restaurant']);

Route::post('/commande/proposition/{id}/{prop}', [\App\Http\Controllers\FrontController::class,'accepter_proposition']);
Route::get('/commande/proposition/{id}/{prop}', [\App\Http\Controllers\FrontController::class,'accepter_proposition']);

Route::get('/restaurant/commande', [\App\Http\Controllers\FrontController::class,'commande_resto']);
Route::get('/restaurant/historique', [\App\Http\Controllers\FrontController::class,'historique_commande']);

Route::get('/restaurant/commande/accepter/{id}', [\App\Http\Controllers\FrontController::class,'accepter_commande_resto']);
Route::post('/restaurant/commande/accepter/{id}', [\App\Http\Controllers\FrontController::class,'accepter_commande_resto']);


Route::get('/restaurant/commande/refuser/{id}', [\App\Http\Controllers\FrontController::class,'refuser_commande_resto']);
Route::post('/restaurant/commande/refuser/{id}', [\App\Http\Controllers\FrontController::class,'refuser_commande_resto']);

Route::post('/restaurant/commande/{id}', [\App\Http\Controllers\FrontController::class,'accepter_commande_resto']);

Route::post('/restaurant/commande/N', [\App\Http\Controllers\FrontController::class,'commande_resto_réfusé']);

Route::get('/mes-achats', [\App\Http\Controllers\FrontController::class,'mes_achats']);


Route::get('/category/{id}', [\App\Http\Controllers\FrontController::class, 'category']);
Route::get('/livreur/demande', [\App\Http\Controllers\FrontController::class, 'livreur']);
Route::post('/livreur/demande', [\App\Http\Controllers\FrontController::class, 'demande_livreur']);

Route::get('/restaurant/demande', [\App\Http\Controllers\FrontController::class, 'restaurant_inscri']);
Route::post('/restaurant/demande', [\App\Http\Controllers\FrontController::class, 'demande_restaurant']);


//Gestion de Menu 
Route::get('/restaurant/liste', [\App\Http\Controllers\FrontController::class, 'liste_menu']);
Route::get('/restaurant/gestion-menu/{id}', [\App\Http\Controllers\FrontController::class, 'dashboard_menu']);

Route::get('/produit/ajouter/{id}', [\App\Http\Controllers\FrontController::class, 'ajouter_produit_interface']);
Route::post('/produit/ajouter/{id}', [\App\Http\Controllers\FrontController::class, 'ajouter_produit']);

Route::post('/produit/supprimer/{id_resto}/{id_prod}', [\App\Http\Controllers\FrontController::class, 'supprimer_produit']);
Route::get('/produit/supprimer/{id_resto}/{id_prod}', [\App\Http\Controllers\FrontController::class, 'supprimer_produit']);

Route::get('/produit/modifier/{id_resto}/{id_prod}', [\App\Http\Controllers\FrontController::class, 'modifier_produit_interface']);
Route::post('/produit/modifier/{id_resto}/{id_prod}', [\App\Http\Controllers\FrontController::class, 'modifier_produit']);

//* */

//Panier 
Route::get('/panier', [\App\Http\Controllers\FrontController::class, 'panier']);
Route::post('/panier', [\App\Http\Controllers\FrontController::class, 'chekout']);

Route::get('/panier/all', [\App\Http\Controllers\FrontController::class, 'panierdeteleall']);
Route::get('/panier/{id}', [\App\Http\Controllers\FrontController::class, 'panierdetele']);




// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return redirect('/');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/my_admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboardAdmin');





Route::resource('my_admin/categorie', \App\Http\Controllers\CategorieController::class);
Route::resource('my_admin/livreur', \App\Http\Controllers\LivreurController::class);
Route::resource('my_admin/restaurant', \App\Http\Controllers\RestaurantController::class);
Route::resource('my_admin/produit', \App\Http\Controllers\ProduitController::class);
Route::resource('my_admin/user', \App\Http\Controllers\UserController::class);
Route::resource('my_admin/parametre', \App\Http\Controllers\ParametreController::class);
Route::resource('/my_admin/best_resto', \App\Http\Controllers\BestRestoController::class);
Route::resource('/my_admin/commande', \App\Http\Controllers\CommandeController::class);





Route::get('my_admin/verification-livreur/refuse/{id}', [\App\Http\Controllers\DemandeLivrController::class,'refuse_livreur']);
Route::post('my_admin/verification-livreur/refuse/{id}', [\App\Http\Controllers\DemandeLivrController::class,'refuse_livreur']);
Route::get('my_admin/verification-livreur/validation/{id}', [\App\Http\Controllers\DemandeLivrController::class,'validation_livreur']);
Route::post('my_admin/verification-livreur/validation/{id}', [\App\Http\Controllers\DemandeLivrController::class,'validation_livreur']);

Route::get('livreur/verification/{id}', [\App\Http\Controllers\Demande_RestoController::class,'demande_livreur']);
Route::post('livreur/verification/{id}', [\App\Http\Controllers\Demande_RestoController::class,'demande_livreur']);


Route::get('my_admin/verification-restaurant/refuse/{id}', [\App\Http\Controllers\Demande_RestoController::class,'refuse_restaurant']);
Route::post('my_admin/verification-restaurant/refuse/{id}', [\App\Http\Controllers\Demande_RestoController::class,'refuse_restaurant']);
Route::get('my_admin/verification-restaurant/validation/{id}', [\App\Http\Controllers\Demande_RestoController::class,'validation_restaurant']);
Route::post('my_admin/verification-restaurant/validation/{id}', [\App\Http\Controllers\Demande_RestoController::class,'validation_restaurant']);

Route::get('restaurant/verification/{id}', [\App\Http\Controllers\Demande_RestoController::class,'demande_restaurant']);
Route::post('restaurant/verification/{id}', [\App\Http\Controllers\Demande_RestoController::class,'demande_restaurant']);



Route::get('my_admin/restaurant/menu/{restaurant}', [\App\Http\Controllers\RestaurantController::class ,'menu']);
Route::post('my_admin/restaurant/menu/{restaurant}', [\App\Http\Controllers\RestaurantController::class ,'menu']);

Route::get('my_admin/parametre/{parametre}', [\App\Http\Controllers\ParametreController::class ,'update']);
Route::post('my_admin/parametre/{parametre}', [\App\Http\Controllers\ParametreController::class ,'update']);


Route::get('my_admin/verification-restaurant/', [\App\Http\Controllers\Demande_RestoController::class,'index']);
Route::get('my_admin/verification-livreur/', [\App\Http\Controllers\DemandeLivrController::class,'index']);
