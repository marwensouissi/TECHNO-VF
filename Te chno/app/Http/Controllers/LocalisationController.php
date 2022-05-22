<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelocalisationRequest;
use App\Http\Requests\UpdatelocalisationRequest;
use App\Models\localisation;

class LocalisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorelocalisationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelocalisationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function show(localisation $localisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function edit(localisation $localisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelocalisationRequest  $request
     * @param  \App\Models\localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelocalisationRequest $request, localisation $localisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\localisation  $localisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(localisation $localisation)
    {
        //
    }
}
