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
        $lieux = Lieu::with('categorie', 'region', 'user')
                     ->join('categories', 'lieus.categorie_id', '=', 'categories.id')
                     ->join('regions', 'lieus.region_id', '=', 'regions.id')
                     ->join('users', 'lieus.user_id', '=', 'users.id')
                     ->withCount('commentaires_reponses')
                     ->paginate(5);
        return view('lieu.index', compact('lieux'));
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
        return view('lieu.create', compact('regions', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newLieu = $request->validate([
            'image' => 'required|string|min:10|max:60',
            'alt_image' => 'required|string|min:10|max:50',
            'nom' => 'required|string',
            'description' => 'required|string|min:3|max:255',
            'prix' => 'required|integer',
            'map' => 'nullable',
            'user_id' => 'required',
            'categorie_id' => 'required',
            'region_id' => 'required'
        ]);

        $imageName = "";
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $newLieu = new Lieu;
        $newLieu->image = '/images/' . $imageName;
        $newLieu->alt_image = $request->alt_image;
        $newLieu->nom = $request->nom;
        $newLieu->description = $request->description;
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
    public function show(Lieu $lieu)
    {
        $commentaires = Commentaire::all();
        return view('lieu.show', compact('lieu', 'commentaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lieu $lieu) 
    {
        $regions = Region::all();
        $categories = Categorie::all();
        $this->authorize('update', $lieu);
        return view('lieu.edit', compact('lieu', 'regions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lieu $lieu)
    {
        $this->authorize('update', $lieu);
        $majLieu = $request->validate([
            'image' => 'required',
            'alt_image' => 'required',
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
        
        $lieu->update($majLieu);
        return redirect()->route('lieu.index')
                         ->with('success', 'Votre lieu a été modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lieu $lieu)
    {
        $this->authorize('delete', $lieu);
        $lieu->delete();
        return redirect()->route('lieu.index')
                         ->with('success', 'Le lieu a bien été supprimé !');
    }

    public function search() {
        $q = request()->input('q');

        $lieux = Lieu::with('categorie', 'region')
                     ->join('categories', 'lieus.categorie_id', '=', 'categories.id')
                     ->join('regions', 'lieus.region_id', '=', 'regions.id')
                     ->where("nom", "like", "%$q%")
                     ->orWhere("description", "like", "%$q%")
                     ->orWhere("categories.type", "like", "%$q%")
                     ->orWhere("regions.nom_region", "like", "%$q%")
                     ->select('lieus.*')
                     ->paginate(5);
        return view('lieu.search', compact('lieux'));
    } 
}
