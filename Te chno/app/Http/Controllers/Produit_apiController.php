<?php

namespace App\Http\Controllers;
use App\Models\categorie;
use App\Models\restaurant;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Produit_apiController extends Controller
{



public function index()
    {
        $data['produits'] = produit::orderBy('id', 'asc')->get();
        $data['categories'] = categorie::orderBy('id', 'asc')->get();
        $data['restaurants'] = restaurant::orderBy('id', 'asc')->get();

        return view('admin.produit.index', $data);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = categorie::get();
        $data['restaurants'] = restaurant::get();

        return view('admin.produit.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproduitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'etat' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/produit', $filename);
        }
      
     //  where(Auth::user()->id;);
   //  $X= $restaurant->id where(Auth::user()->id); 

        //dd(Auth::user()->restaurant->id_user);

        $produit = new produit();

        $produit->nom = $request->input('nom');
        $produit->prix = $request->input('prix');
        $produit->etat = $request->input('etat');
        $produit->id_categorie = $request->input('categorie');
        $produit->id_restaurant  = Auth::user()->restaurant->id;
        $produit->image = $filename;
        $produit->save();

      

        $response = "Produit ajouté avec succeés";
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */

    public function edit(produit $produit)
    {
        $data['categories'] = categorie::get();
        $data['restaurants'] = restaurant::get();

        return view('admin.produit.edit', compact('produit'),$data);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,produit $produit)
    {
       
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'etat' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/produit/', $filename);
        }
    
    

        $produit->nom = $request->input('nom');
        $produit->prix = $request->input('prix');
        $produit->etat = $request->input('etat');
        $produit->id_categorie = $request->input('categorie');
        $produit->id_restaurant  = $request->input('restaurant');
        $produit->image = $filename;
        $produit->save();


        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(produit $produit)
    {
        $file = $produit->image;
        if(\File::exists(public_path('images/produit/', $file))){
        $path="images/produit/";
        $X= $path.$file;
            \File::delete(public_path($X));
        }else{
            dd('File not found',public_path('images/produit', $file) );
        }
        $produit->delete();




    }
}
