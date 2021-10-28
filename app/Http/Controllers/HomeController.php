<?php

namespace App\Http\Controllers;

use App\Models\Lieu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lieux = Lieu::with('categorie', 'region', 'user')
                     ->withCount('commentaires_reponses')
                     ->paginate(5);
        return view('home', compact('lieux'));
    }
}
