<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Categorie;
use App\Models\Lieu;
use App\Models\Commentaire;
use App\Models\User;
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
                     ->select('lieus.id', 'lieus.nom', 'lieus.prix', 'lieus.map', 'lieus.image', 'lieus.alt_image','lieus.description', 'lieus.user_id','lieus.created_at', 'users.prenom as name', 'categories.nom as cat', 'regions.nom as reg', 'users.id as u', 'users.role_id as role_id')
                     ->withCount('commentaires_reponses')
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
    public function show($id)
    {
        $lieu = Lieu::findOrFail($id);
        $commentaires = Commentaire::all();
        return view('lieux.show', compact('lieu', 'commentaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $lieu = Lieu::findOrFail($id);
        $regions = Region::all();
        $categories = Categorie::all();
        $this->authorize('update', $lieu);
        return view('lieux.edit', compact('lieu', 'regions', 'categories'));
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
        $lieu = Lieu::findOrFail($id);
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
        $lieu = Lieu::findOrFail($id);
        $this->authorize('delete', $lieu);
        $lieu->delete();
        return redirect()->route('lieux.index')
                         ->with('success', 'Le lieu a bien été supprimé !');
    }

    public function search() {
        $q = request()->input('q');

        $lieux = Lieu::Where("name", "like", "% $q %")
            ->orWhere("description", "like", "% $q %")
            ->paginate(5);
        return view('lieux.search', compact('lieux'));

    }
}
