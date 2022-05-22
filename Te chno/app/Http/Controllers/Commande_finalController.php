<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\Commande_confirm;
use App\Models\commande;
use App\Models\commandes_f;
use App\Models\restaurant;
use App\Models\produit;
use App\Models\livreur;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Commande_finalController extends Controller
{
    public function commande_final(Request $request)
    {
        $commande_final = new commandes_f();


        $x=Auth::user()->id;
        $livreur= livreur::where('id_user',$x)->first();

        $y = request()->segment(4);
        $commande= commande::where('id',$y)->first();

        $commande_final->id_produit = $commande->id_produit;
        $commande_final->id_user = $commande->id_user;
        $commande_final->id_commande = $y;
        $commande_final->confirmation = 0;
        $commande_final->id_restaurant  = $commande->id_restaurant;
        $commande_final->id_livreur  = $livreur->id;
        $commande_final->prix = $request->input('prix');
        $commande_final->temps = $request->input('temps');
    
        $commande_final->save();

        $response = "Commande ajouté avec succeés";
        return response($response, 201);
    }


    

    public function confirm(commandes_f $commande_final) 
    {
        $y = request()->segment(4);
        $commande_f= commandes_f::where('id',$y)->first();
        $commande_f->confirmation = 1;
        $commande_f->save();       
        // $commande= commandes_f::where([['id_commande',$commande_f->id_commande],['confirmation',0]]);
        
        $commande_conf = new Commande_confirm();
        $commande_conf->id_commande_final = $commande_f->id;
        $commande_conf->id_produit = $commande_f->id_produit;
        $commande_conf->id_user = $commande_f->id_user;
        $commande_conf->id_commande = $commande_f->id_commande;
        $commande_conf->id_restaurant  = $commande_f->id_restaurant;
        $commande_conf->id_livreur  = $commande_f->id_livreur;
        $commande_conf->prix = $commande_f->prix;
        $commande_conf->temps = $commande_f->temps;
                                                                                                
        $commande_conf->save();



        $response = "Commande confirmée";
        return response($response, 201);

    }



}
