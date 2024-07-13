<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Http\Requests\StoreFonctionRequest;
use App\Http\Requests\UpdateFonctionRequest;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFonctionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fonction $fonction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFonctionRequest $request, Fonction $fonction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fonction $fonction)
    {
        //
    }
}
