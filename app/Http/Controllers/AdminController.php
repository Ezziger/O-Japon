<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Models\Lieu;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function getLieux()
    {
        $lieux = Lieu::all();
        return view('admin.lieux', compact('lieux'));
    }

    public function getCommentaires()
    {
            $commentaires = Commentaire::all();
            return view('admin.commentaires', compact('commentaires'));
        } 
    }

