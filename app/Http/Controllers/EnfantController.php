<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Contenu;

class EnfantController extends Controller
{
    // Méthode pour afficher les contenus dans l'espace enfant
    public function index()
    {
        // Récupérer tous les contenus depuis la base de données
        $contenus = Contenu::all();
       
        // Retourner la vue associée avec les contenus
        return view('enfant.index', compact('contenus'));
    }
}