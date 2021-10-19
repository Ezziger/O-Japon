<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriController extends Controller
{
    public function index () {
        $user = User::find(Auth::user()->id);
        $user->load('favoris');
        return view ('favoris.index', compact('user'));
    }

    public function store(Request $request)
    {
        $lieuId = $request->input('lieuId');
        $user = User::find(auth()->user()->id);
        $user->favoris()->attach($lieuId);
        return redirect()->back()->with('message', 'Lieu ajouté aux favoris !');
    } 

    public function destroy(Request $request)
    {
        $lieuId = $request->input('lieuId');
        $user = User::find(auth()->user()->id);
        $user->favoris()->detach($lieuId);
        return redirect()->back()->with('message', 'Lieu retiré de vos favoris !');
    }

}
