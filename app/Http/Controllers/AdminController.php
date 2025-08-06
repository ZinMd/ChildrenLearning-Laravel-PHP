<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Models\Contenu;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return $this->dashboard();
    }

    public function dashboard()
    {
        $stats = [
            'categories' => Categorie::count(),
            'sousCategories' => SousCategorie::count(),
            'contenus' => Contenu::count(),
            'derniersContenus' => Contenu::with('sousCategorie')
                ->latest()
                ->take(5)
                ->get(),
            'categoriesPopulaires' => Categorie::withCount('sousCategories')
                ->orderBy('sous_categories_count', 'desc')
                ->take(5)
                ->get()
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
