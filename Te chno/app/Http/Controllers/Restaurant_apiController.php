<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\restaurant;
use App\Models\produit;
use App\Models\livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Restaurant_apiController extends Controller
{


    public function index()
    {
        $data['restaurants'] = restaurant::orderBy('id', 'asc')->get();
        $data['users'] = user::orderBy('id', 'asc')->get();

        return view('admin.restaurant.index', $data);
    }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'etat' => 'required',
            'numéro_tel' => 'required',
            'image'=> 'required',
            'lat'=> 'required',
            'lng'=> 'required',



        ]);




        $restaurant = new restaurant();
        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/restaurant/', $filename);
        }
      
        $restaurant->id_user = Auth::user()->id;
        $restaurant->nom = $request->input('nom');
        $restaurant->numéro_tel = $request->input('numéro_tel');
        $restaurant->adresse = $request->input('adresse');
        $restaurant->etat = $request->input('etat');
        $restaurant->lat = $request->input('lat');
        $restaurant->lng = $request->input('lng');
        $restaurant->image = $filename;


        $restaurant->save();
       
    }
    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */

    public function edit(restaurant $restaurant)
    {
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, restaurant $restaurant)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'etat' => 'required',
            'numéro_tel' => 'required',
            'image'=> 'required',
            'lat'=> 'required',
            'lng'=> 'required',



        ]);



        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/restaurant/', $filename);
        }
      
        $restaurant->nom = $request->input('nom');
        $restaurant->adresse = $request->input('adresse');
        $restaurant->etat = $request->input('etat');
        $restaurant->numéro_tel = $request->input('numéro_tel');

        $restaurant->lat = $request->input('lat');
        $restaurant->lng = $request->input('lng');
        $restaurant->image = $filename;



        $restaurant->save();
    
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);

        $file = $restaurant->image;
        if (\File::exists(public_path('images/restaurant/', $file))) {
            $path="images/restaurant/";
            $X= $path.$file;
            \File::delete(public_path($X));
        } else {
            dd('File not found', public_path('images/restaurant', $file));
        }


        $restaurant->delete();



    
    }

   




    public function menu($restaurant)
    {
        $data['produits'] = produit::where('id_restaurant', $restaurant)->get();

        //dd($data['produits']);
        return view('admin.restaurant.menu', $data);
    }


}
