<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    /********** STOCKE UN COMMENTAIRE EN BASE DE DONNEES **********/
    
    public function store(Request $req) {
        $req->validate([
            'commentaire' => 'required',
        ]);

        $input = $req->all();
        $input['user_id'] = auth()->user()->id;

        Commentaire::create($input);
        return back()->with('success', 'Votre commentaire a été posté avec succès !');
    }

        /********** MET A JOUR UN COMMENTAIRE EN BASE DE DONNEES **********/

    public function update(Request $request, Commentaire $commentaire) {

        $majCommentaire = $request->validate([
            'commentaire' => 'required',
        ]);

        $majCommentaire = $request->except('_token', '_method');

        $commentaire->update($majCommentaire);
        return back()->with('success', 'Votre commentaire a été modifié avec succès !');
    }

            /********** SUPPRIME UN COMMENTAIRE EN BASE DE DONNEES **********/

    public function destroy(Commentaire $commentaire) {
        $commentaire->delete();
        return back()->with('success', 'Votre commentaire a bien été supprimée');
    }
}
