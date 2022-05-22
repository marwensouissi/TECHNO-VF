<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\demande;
use App\Models\livreur;
use App\Models\produit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\demande_livr;


class DemandeLivrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roleadmin = User::find(Auth::user()->id);
        if($roleadmin->isAdmin != 1 )
        {
        return redirect('/');
        } 
        
        $data['demande_livrs'] = demande_livr::orderBy('id', 'asc')->get();

        return view('admin.validation.livreur', $data);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storedemande_livrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedemande_livrRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\demande_livr  $demande_livr
     * @return \Illuminate\Http\Response
     */
    public function show(demande_livr $demande_livr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\demande_livr  $demande_livr
     * @return \Illuminate\Http\Response
     */
    public function edit(demande_livr $demande_livr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedemande_livrRequest  $request
     * @param  \App\Models\demande_livr  $demande_livr
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedemande_livrRequest $request, demande_livr $demande_livr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\demande_livr  $demande_livr
     * @return \Illuminate\Http\Response
     */
    public function destroy(demande_livr $demande_livr)
    {
        //
    }
    public function demande_livreur(Request $request)
    {
        $data['parametres'] = parametre::get();

        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'etat' => 'required',
            'statut' => 'required',
            'numéro_tel' => 'required',
          
        ]);
        
        $demande = new demande_livr();
        
    
        $demande->id_user = Auth::user()->id;
        $demande->nom = $request->input('nom');
        $demande->numéro_tel = $request->input('numéro_tel');
        $demande->adresse = $request->input('adresse');
        $demande->etat = "Désactivé";
        $demande->save();
    
        return view('home.index',$data);
    
    }

    public function validation_livreur($id)
    {
        $demande= demande_livr::where('id',$id)->first();
        $livreur = new livreur();


        $livreur->id_user = $demande->id_user;
        $livreur->nom = $demande->nom;
        $livreur->etat = $demande->etat;
        $livreur->numéro_tel = $demande->numéro_tel;
        $livreur->adresse = $demande->adresse ;
        $livreur->save();
        $demande->delete();
        return redirect('my_admin/verification-livreur');


    }

    public function refuse_livreur($id)
    {
        $demande = demande_livr::find($id);

        $demande->delete();
        return redirect('my_admin/verification-livreur');
    
    }






}
