<?php

namespace App\Http\Controllers;
use App\Models\parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\user;

class ParametreController extends Controller
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

        $data['parametres'] = parametre::orderBy('id', 'asc')->get();

        return view('admin.parametre.index', $data);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.parametre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreparametreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasfile('slider')) {
            $file = $request->file('slider');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/slider', $filename);
        }
        
            $parametre = new parametre();
            $parametre->facebook = $request->input('facebook');
            $parametre->instagram = $request->input('instagram');
            $parametre->num_tel = $request->input('numéro_tel');
            $parametre->twitter = $request->input('twitter');
            $parametre->slider = $filename;


            $parametre->save();
        
        return redirect()->route('parametre.index')
            ->with('success', 'parametre created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\parametre  $parametre
     * @return \Illuminate\Http\Response
     */
    public function show(parametre $parametre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parametre  $parametre
     * @return \Illuminate\Http\Response
     */

    public function edit(parametre $parametre)
    {
        return view('admin.parametre.edit', compact('parametre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateparametreRequest  $request
     * @param  \App\Models\parametre  $parametre
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, parametre $parametre)
    {
    
        if ($request->hasfile('slider')) {
            $file = $request->file('slider');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('images/slider', $filename);
        }
        

        $parametre->facebook = $request->input('facebook');
        $parametre->instagram = $request->input('instagram');
        $parametre->num_tel = $request->input('numéro_tel');
        $parametre->twitter = $request->input('twitter');
        $parametre->slider = $filename;

        $parametre->save();


        return redirect()->route('parametre.index')
            ->with('success', 'parametre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parametre  $parametre
     * @return \Illuminate\Http\Response
     */
    public function destroy(parametre $parametre)
    {
        $file = $parametre->image;
        if(\File::exists(public_path('images/slider/', $file))){
         $path="images/slider/";
        $X= $path.$file;
            \File::delete(public_path($X)); 
        }
        else{
            dd('File not found',public_path('images/slider', $file) );
        }
        $parametre->delete();

        return redirect()->route('parametre.index')
            ->with('success', 'parametre deleted successfully');
    }
}
