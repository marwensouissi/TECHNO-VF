<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Livreur_apiController extends Controller
{
    
    public function index()
    {
        $data['livreurs'] = livreur::orderBy('id', 'asc')->get();
        $data['users'] = user::orderBy('id', 'asc')->get();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorelivreurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'numéro_tel' => 'required',
            'adresse'=> 'required',
        ]);

        //dd("Si Mahdi");


        $livreur = new livreur();
        $livreur->id_user = Auth::user()->id;
        $livreur->nom = $request->input('nom');
        $livreur->numéro_tel = $request->input('numéro_tel');
        $livreur->adresse = $request->input('adresse');
    
        $livreur->save();

        $response = "Livreur ajouté avec succeés";
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function show(livreur $livreur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\livreur  $livreur
     * @return \Illuminate\Http\Response
     */



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelivreurRequest  $request
     * @param  \App\Models\livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, livreur $livreur)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'numéro_tel' => 'required',
        ]);

    

        $livreur->nom = $request->input('nom');
        $livreur->numéro_tel = $request->input('numéro_tel');
        $livreur->adresse = $request->input('adresse');
        $livreur->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $livreur = Livreur::find($id);

        $livreur->delete();
    }
}
