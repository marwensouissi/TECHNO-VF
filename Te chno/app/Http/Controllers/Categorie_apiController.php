<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Categorie_apiController extends Controller
{

  

public function index()
    {
        $data['categories'] = categorie::orderBy('id', 'asc')->get();

        return view('admin.categorie.index', $data);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/categorie', $filename);
        }
        
            $categorie = new categorie();
            $categorie->nom = $request->input('nom');
           
            $categorie->image = $filename;


            $categorie->save();
        
       


    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */

    public function edit(categorie $categorie)
    {
        return view('admin.categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategorieRequest  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, categorie $categorie)
    {
       
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/categorie', $filename);
        }
        

        $categorie->nom = $request->input('nom');
        $categorie->image = $filename;

        $categorie->save();


    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $file = $categorie->image;
        if(\File::exists(public_path('images/categorie/', $file))){
        $path="images/categorie/";
        $X= $path.$file;
            \File::delete(public_path($X));
        }else{
            dd('File not found',public_path('images/categorie', $file) );
        }
        $categorie->delete();




    }

}
