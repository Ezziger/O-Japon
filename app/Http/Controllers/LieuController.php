<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Categorie;
use App\Models\Lieu;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class LieuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lieux = Lieu::join('categories', 'lieus.categorie_id', '=', 'categories.id')
                     ->join('regions', 'lieus.region_id', '=', 'regions.id')
                     ->join('users', 'lieus.user_id', '=', 'users.id')
                     ->select('lieus.id', 'lieus.nom', 'lieus.prix', 'lieus.map', 'lieus.image', 'lieus.user_id', 'users.prenom as name', 'categories.nom as cat', 'regions.nom as reg')
                     ->get();
        return view('lieux.index', compact('lieux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        $categories = Categorie::all();
        return view('lieux.create', compact('regions', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = "";
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $newLieu = new Lieu;
        $newLieu->image = '/images/' . $imageName;
        $newLieu->nom = $request->nom;
        $newLieu->prix = $request->prix;
        $newLieu->map = $request->map;
        $newLieu->user_id = auth()->user()->id;
        $newLieu->categorie_id = $request->categorie_id;
        $newLieu->region_id = $request->region_id;
        $newLieu->save();
        return back()->with('success', 'Votre lieu a été sauvegardée avec succès !' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lieu = Lieu::find($id);
        $commentaires = Commentaire::all();
        $categorie = Categorie::find($id);
        $region = Region::find($id);
        return view('lieux.show', compact('lieu', 'commentaires', 'categorie', 'region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Lieu $lieu)
    {
        $this->authorize('update', $lieu);
        $lieu = Lieu::findOrFail($id);
        $categories = Categorie::all();
        $regions = Region::all();
        return view('lieux.edit', compact('lieu', 'categories', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Lieu $lieu)
    {
        $this->authorize('update', $lieu);
        $majLieu = $request->validate([
            'image' => 'required',
            'nom' => 'required',
            'prix' => 'required',
            'map' => 'required',
            'categorie_id' => 'required',
            'region_id' => 'required',
        ]);

        $majLieu = $request->except('_token', '_method');

        if($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $majLieu['image'] = "/images/" . $imageName;
        }

        Lieu::whereId($id)->update($majLieu);
        return redirect()->route('lieux.index')
                         ->with('success', 'Votre lieu a été modifié avec succès !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Lieu $lieu)
    {
        $this->authorize('delete', $lieu);
        $lieu = Lieu::findOrFail($id);
        $lieu->delete();
        return redirect()->route('lieux.index')
                         ->with('success', 'Le lieu a bien été supprimé !');
    }

}
