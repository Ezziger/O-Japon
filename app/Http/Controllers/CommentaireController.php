<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;


class CommentaireController extends Controller
{
    public function store(Request $req) {
        $req->validate([
            'commentaire' => 'required',
        ]);

        $input = $req->all();
        $input['user_id'] = auth()->user()->id;

        Commentaire::create($input);
        return back();
    }

    public function edit() {

    }

    public function destroy(Commentaire $commentaire, $id) {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();
        return back()->with('success', 'Votre commentaire a bien été supprimée');
    }
}
