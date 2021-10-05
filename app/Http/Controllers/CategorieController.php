<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCategorie = $request->validate([
            'type' => 'required|string|min:3|max:20',
        ]);

        $newCategorie = new Categorie;
        $newCategorie->type = $request->type;
        $newCategorie->save();

        return redirect()->route('categorie.create')
                         ->with('success', 'Votre nouvelle catégorie a bien été ajoutée !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $majCategorie = $request->validate([
            'type' => 'required|string|min:3|max:20'
        ]);

        $majCategorie = $request->except('_token', '_method');

        $categorie->update($majCategorie);
        return redirect()->route('categories.index')
               ->with('success', 'Votre catégorie a bien été mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')
                     ->with('success', 'Votre catégorie a bien été supprimée !');
    }
}
