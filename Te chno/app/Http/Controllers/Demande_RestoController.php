<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\demande;
use App\Models\restaurant;
use App\Models\produit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Demande_RestoController extends Controller
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
        
        $data['demandes'] = demande::where('genre', 'Restaurant')->get();

        return view('admin.validation.restaurant', $data);

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
     * @param  \App\Http\Requests\StoredemandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedemandeRequest  $request
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedemandeRequest $request, demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(demande $demande)
    {
        //
    }
    public function demande_restaurant(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'etat' => 'required',
            'statut' => 'required',
            'numéro_tel' => 'required',
            'image'=> 'required',
            'lat'=> 'required',
            'lng'=> 'required',
        ]);
        
        $demande = new demande();
        
        if ($request->hasfile('image')) 
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/restaurant/', $filename);
        } 
        $demande->id_user = Auth::user()->id;
        $demande->nom = $request->input('nom');
        $demande->statut = $request->input('statut');
        $demande->numéro_tel = $request->input('numéro_tel');
        $demande->adresse = $request->input('adresse');
        $demande->etat = "Désactivé";
        $demande->genre = "Restaurant";
        $demande->lat = $request->input('lat');
        $demande->lng = $request->input('lng');
        $demande->image = $filename;
        $demande->save();
    
        return view('home.index');


    
    }
    



    public function validation_restaurant($id)
    {
        $demande= demande::where('id',$id)->first();
        $restaurant = new restaurant();


        $restaurant->id_user = $demande->id_user;
        dd($restaurant);
        $restaurant->nom = $demande->nom;
        $restaurant->numéro_tel = $demande->numéro_tel;
        $restaurant->adresse = $demande->adresse ;
        $restaurant->statut = $demande->statut ;
        $restaurant->etat = "activé";
        $restaurant->lat = $demande->lat;
        $restaurant->lng = $demande->lng;
        $restaurant->image = $demande->image;

        $restaurant->save();
        $demande->delete();
        return redirect('my_admin/verification-restaurant');


    }
   
    public function refuse_restaurant($id)
    {
           $demande = demande::find($id);
           $file = $demande->image;
           if(\File::exists(public_path('images/restaurant/', $file))){
            $path="images/restaurant/";
           $X= $path.$file;
               \File::delete(public_path($X)); 
           }
           else{
               dd('File not found',public_path('images/restaurant', $file) );
           }

        $demande->delete();
        return redirect('my_admin/verification-restaurant');
    }




}
