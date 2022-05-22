<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\commande;
use App\Models\commande_confirm;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function index()
    {
        $roleadmin = User::find(Auth::user()->id);
        if($roleadmin->isAdmin != 1 )
        {
        return redirect('/');
        } 
        
        $data['commande_confirms'] = commande_confirm::orderBy('id', 'asc')->get();
        $data['users'] = user::orderBy('id', 'asc')->get();
        return view('admin.commande.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecommandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commande = new commande();
        
        $commande->id_user = Auth::user()->id;
        $produit= produit::find(request('produit'));
        //dd($produit);
        
        // $x = produit::restaurants();
        // dd($x);
        
        $commande->id_produit = $produit->id;
        $commande->id_restaurant  = $produit->id_restaurant ;
        $commande->lat = $request->input('lat');
        $commande->lng = $request->input('lng');
        $commande->save();

        $response = "Commande ajouté avec succeés";
        return response($response, 201);
    }




    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecommandeRequest  $request
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commande $commande)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'numéro_tel' => 'required',
        ]);

    

        $commande->nom = $request->input('nom');
        $commande->numéro_tel = $request->input('numéro_tel');
        $commande->adresse = $request->input('adresse');
        $commande->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande = commande::find($id);

        $commande->delete();
    }
}
