<?php

namespace App\Http\Controllers;

use App\Models\best_resto;
use App\Models\user;
use App\Models\demande;
use App\Models\restaurant;
use App\Models\produit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BestRestoController extends Controller
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
        
        $data['restaurants'] = restaurant::orderBy('id', 'asc')->get();
        $data['best_restos'] = best_resto::orderBy('id', 'asc')->get();


        return view('admin.BestResto.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['restaurants'] = restaurant::get();

        return view('admin.bestResto.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebest_restoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
      


        $request->validate([
            'restaurant' => 'required',
           
        ]);



        $best_resto = new best_resto();

        $id_resto= $request->input('restaurant');


        $restaurant= restaurant::where('id',$id_resto)->first();

        $best_resto->id_user = $restaurant->id_user;
        $best_resto->nom = $restaurant->nom;
        $best_resto->numéro_tel = $restaurant->numéro_tel;
        $best_resto->adresse = $restaurant->adresse;
        $best_resto->etat = $restaurant->etat;
        $best_resto->statut = $restaurant->statut;
        $best_resto->image = $restaurant->image;

        $best_resto->save();
        return redirect('/my_admin/best_resto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\best_resto  $best_resto
     * @return \Illuminate\Http\Response
     */
    public function show(best_resto $best_resto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\best_resto  $best_resto
     * @return \Illuminate\Http\Response
     */
    public function edit(best_resto $best_resto)
    {
        return view('admin.bestResto.edit', compact('best_resto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebest_restoRequest  $request
     * @param  \App\Models\best_resto  $best_resto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $best_resto = best_resto::find($id);

        
        $id_resto= $request->input('restaurant');
        $restaurant= restaurant::where('id',$id_resto)->first();

        $best_resto->id_user = $restaurant->id_user;
        $best_resto->id_resto = $restaurant->id;
        $best_resto->nom = $restaurant->nom;
        $best_resto->numéro_tel = $restaurant->numéro_tel;
        $best_resto->adresse = $restaurant->adresse;
        $best_resto->etat = $restaurant->etat;
        $best_resto->statut = $restaurant->statut;
        $best_resto->image = $restaurant->image;

        $best_resto->save();
        return redirect('/my_admin/best_resto');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\best_resto  $best_resto
     * @return \Illuminate\Http\Response
     */
    public function destroy(best_resto $best_resto)
    {
        //
    }
}
