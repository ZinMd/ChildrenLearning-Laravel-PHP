<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\SousCategorie;

class ContenuController extends Controller
{
    public function index()
    {
        $contenus = Contenu::with('sousCategorie')->get();
        return view('admin.contenu.index', compact('contenus'));
    }

    public function create()
    {
        $sousCategories = SousCategorie::all();
        return view('admin.contenu.create', compact('sousCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'sous_categorie_id' => 'required|exists:sous_categories,id',
        ]);

        $contenu = new Contenu();
        $contenu->titre = $request->titre;
        $contenu->description = $request->description;
        $contenu->sous_categorie_id = $request->sous_categorie_id;

        if ($request->hasFile('fichier')) {
            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $contenu->fichier = $filename;
        }

        $contenu->save();

        return redirect()->route('admin.contenus.index')->with('success', 'Contenu ajouté avec succès.');
    }

    public function show($id)
    {
        $contenu = Contenu::with('sousCategorie')->findOrFail($id);
        return view('admin.contenu.show', compact('contenu'));
    }

    public function edit($id)
    {
        $contenu = Contenu::findOrFail($id);
        $sousCategories = SousCategorie::all();
        return view('admin.contenu.edit', compact('contenu', 'sousCategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'sous_categorie_id' => 'required|exists:sous_categories,id',
        ]);

        $contenu = Contenu::findOrFail($id);
        $contenu->titre = $request->titre;
        $contenu->description = $request->description;
        $contenu->sous_categorie_id = $request->sous_categorie_id;

        if ($request->hasFile('fichier')) {
            // Supprimer l'ancien fichier s'il existe
            if ($contenu->fichier && file_exists(public_path('uploads/' . $contenu->fichier))) {
                unlink(public_path('uploads/' . $contenu->fichier));
            }

            $file = $request->file('fichier');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $contenu->fichier = $filename;
        }

        $contenu->save();

        return redirect()->route('admin.contenus.index')->with('success', 'Contenu mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $contenu = Contenu::findOrFail($id);

        if ($contenu->fichier && file_exists(public_path('uploads/' . $contenu->fichier))) {
            unlink(public_path('uploads/' . $contenu->fichier));
        }

        $contenu->delete();

        return redirect()->route('admin.contenus.index')->with('success', 'Contenu supprimé.');
    }

    public function afficherContenuPourEnfant()
    {
        $contenus = Contenu::with('sousCategorie')->get();
        return view('enfant.index', compact('contenus'));
    }
}

