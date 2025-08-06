<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Contenu;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil
     */
    public function index()
    {
        $categories = Categorie::with('sousCategories')->get();
        $derniersContenus = Contenu::with('sousCategorie')
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('categories', 'derniersContenus'));
    }

    /**
     * Affiche la page découvrir
     */
    public function decouvrir()
    {
        $categories = Categorie::with(['sousCategories.contenus'])
            ->get();

        return view('categories.index', compact('categories'));
    }
} 