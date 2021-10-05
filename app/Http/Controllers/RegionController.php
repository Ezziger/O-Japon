<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRegion = $request->validate([
            'nom_region' => 'required|string|min:3|max:20',
        ]);

        $newRegion = new Region;
        $newRegion->nom_region = $request->nom_region;
        $newRegion->save();

        return redirect()->route('regions.create')->with('success', 'La nouvelle région a bien été ajoutée !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
         $majRegion = $request->validate([
             'nom_region' => 'required|string|min:3|max:20'
        ]);

        $majRegion = $request->except('_token', '_method');

        $region->update($majRegion);
        return redirect()->route('regions.index')
                         ->with('success', 'La region a bien été mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')
                         ->with('success', 'La région a été supprimée avec succès');
    }
}
