<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Restaurant ;
use App\Models\Produit ;
use App\Models\Livreur ;
use App\Models\Categorie ;
use App\Models\User ;
use App\Models\Commande ;
use App\Models\commande_final ;
use App\Models\demande ;

use App\Models\Parametre ;
use Laravel\Jetstream\Jetstream ;




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

// Route::get('/users', function(){return User::all();});
// Route::post('/users', function(){return User::all();});
// Route::get('/users/{users}', function($user){return User::find($user);});
// Route::post('/users/{users}', function($user){return User::find($user);});

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('/categorie', function(){return Categorie::all();});
Route::get('/livreur', function(){return Livreur::all();});
Route::get('/restaurant', function(){return Restaurant::all();});
Route::get('/users', function(){return user::all();});

// Route::get('/produit', function(){return Produit::all();});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();
});
// sécurisé**********************

Route::group(['middleware' => 'auth:sanctum'], function()
{

Route::post('/categorie/store', [\App\Http\Controllers\Categorie_apiController::class ,'store']);
Route::post('/categorie/destroy/{categorie}', [\App\Http\Controllers\Categorie_apiController::class ,'destroy']);
Route::post('/categorie/update/{categorie}', [\App\Http\Controllers\Categorie_apiController::class ,'update']);

Route::post('/commande/store', [\App\Http\Controllers\CommandeController::class ,'store']);
Route::post('/commande/destroy/{commande}', [\App\Http\Controllers\CommandeController::class ,'destroy']);
Route::post('/commande/livreur/{commande}', [\App\Http\Controllers\Commande_finalController::class ,'commande_final']);
Route::post('/commande/confirmation/{commande}', [\App\Http\Controllers\Commande_finalController::class ,'confirm']);

Route::post('/restaurant/demande', [\App\Http\Controllers\Demande_RestoController::class ,'demande_restaurant']);
Route::post('/livreur/demande', [\App\Http\Controllers\DemandeLivrController::class ,'demande_livreur']);


Route::post('/restaurant/store', [\App\Http\Controllers\Restaurant_apiController::class ,'store']);
Route::post('/restaurant/destroy/{restaurant}', [\App\Http\Controllers\Restaurant_apiController::class ,'destroy']);
Route::post('/restaurant/update/{restaurant}', [\App\Http\Controllers\Restaurant_apiController::class ,'update']);

Route::post('/livreur/store', [\App\Http\Controllers\Livreur_apiController::class ,'store']);
Route::post('/livreur/destroy/{livreur}', [\App\Http\Controllers\Livreur_apiController::class ,'destroy']);
Route::post('/livreur/update/{livreur}', [\App\Http\Controllers\Livreur_apiController::class ,'update']);

Route::post('/produit/store', [\App\Http\Controllers\Produit_apiController::class ,'store']);
Route::post('/produit/destroy/{produit}', [\App\Http\Controllers\Produit_apiController::class ,'destroy']);
Route::post('/produit/update/{produit}', [\App\Http\Controllers\Produit_apiController::class ,'update']);

}
);

Route::get('/produits', function(){return Produit::all();});
Route::get('/produit/{Produit}', function($Produit){return Produit::find($Produit);});
Route::post('/produit/{Produit}', function($Produit){return Produit::find($Produit);});


Route::get('/restaurant/{restaurant}', function($restaurant){return Restaurant::find($restaurant);});
Route::post('/restaurant/{restaurant}', function($restaurant){return Restaurant::find($restaurant);});
Route::get('/restaurant/menu/{restaurant}', function($restaurant){return Produit::where('id_restaurant',$restaurant)->get();});
Route::post('/restaurant/menu/{restaurant}', function($restaurant){return Produit::where('id_restaurant',$restaurant)->get();});


// Route::get('/livreur', function(){return Livreur::all();});
// Route::post('/livreur', function(){return Livreur::all();});

// Route::get('/livreur/{livreur}', function($livreur){return Livreur::find($livreur);});
// Route::post('/livreur/{livreur}', function($livreur){return Livreur::find($livreur);});


// Route::get('/categorie/{categorie}', function($categorie){return Categorie::find($categorie);});
// Route::post('/categorie/{categorie}', function($categorie){return Categorie::find($categorie);});



