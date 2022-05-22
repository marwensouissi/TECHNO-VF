<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class LivreurController extends Controller
{

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

        $data['livreurs'] = livreur::orderBy('id', 'asc')->get();
        $data['users'] = user::orderBy('id', 'asc')->get();

        return view('admin.livreur.index', $data);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.livreur.create');
    }

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
            'adresse' => 'required',
            'numéro_tel' => 'required',
            'email'=> 'required',
            'adresse'=> 'required',
        ]);

        $user = new user();
        $user->email = $request->input('email');
        $user->name = $request->input('nom');
        $user->password = Hash::make($request->input('password'));

        $user->save();


        $livreur = new livreur();
        $livreur->id_user = $user->id;
        $livreur->nom = $request->input('nom');
        $livreur->etat = "1";

        $livreur->numéro_tel = $request->input('numéro_tel');
        $livreur->adresse = $request->input('adresse');
        $livreur->save();
        return redirect()->route('livreur.index')
            ->with('success', 'livreur created successfully.');

            return redirect()->route('livreur.index')
            ->with('success', 'livreur created successfully.');

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

    public function edit(livreur $livreur)
    {
        return view('admin.livreur.edit', compact('livreur'));
    }

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


        return redirect()->route('livreur.index')
            ->with('success', 'livreur updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function destroy(livreur $livreur)
    {
        $livreur->delete();
        $user->delete();


        return redirect()->route('livreur.index')
            ->with('success', 'livreur deleted successfully');
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
    
        return view('home.home',$data);
    
    }
}
