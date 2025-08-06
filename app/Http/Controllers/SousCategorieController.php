<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousCategorie;
use App\Models\Categorie;

class SousCategorieController extends Controller
{
    public function index()
    {
        $sousCategories = SousCategorie::with('categorie')->get();
        return view('admin.sous_categories.index', compact('sousCategories'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('admin.sous_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:sous_categories',
            'categorie_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'audio' => 'nullable|file|mimes:mp3,wav|max:5120',
            'video' => 'nullable|file|mimes:mp4,avi,mov|max:10240'
        ]);

        $sousCategorie = new SousCategorie();
        $sousCategorie->nom = $request->nom;
        $sousCategorie->categorie_id = $request->categorie_id;
        $sousCategorie->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $sousCategorie->image = $imageName;
        }

        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $audioName = time() . '_' . $audio->getClientOriginalName();
            $audio->move(public_path('uploads'), $audioName);
            $sousCategorie->audio = $audioName;
        }

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('uploads'), $videoName);
            $sousCategorie->video = $videoName;
        }

        $sousCategorie->save();
        return redirect()->route('admin.sous_categories.index')->with('success', 'Sous-catégorie ajoutée avec succès');
    }

    public function show($id)
    {
        $sousCategorie = SousCategorie::with(['categorie', 'contenus'])->findOrFail($id);
        return view('admin.sous_categories.show', compact('sousCategorie'));
    }

    public function edit($id)
    {
        $sousCategorie = SousCategorie::findOrFail($id);
        $categories = Categorie::all();
        return view('admin.sous_categories.edit', compact('sousCategorie', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:sous_categories,nom,' . $id,
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $sousCategorie = SousCategorie::findOrFail($id);

        // Mettre à jour les champs simples
        $sousCategorie->nom = $request->nom;
        $sousCategorie->description = $request->description;
        $sousCategorie->categorie_id = $request->categorie_id;

        // Suppression de l'image si demandé
        if ($request->has('delete_image') && $sousCategorie->image) {
            $imagePath = public_path('uploads/' . $sousCategorie->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $sousCategorie->image = null;
        }
        // Suppression de l'audio si demandé
        if ($request->has('delete_audio') && $sousCategorie->audio) {
            $audioPath = public_path('uploads/' . $sousCategorie->audio);
            if (file_exists($audioPath)) {
                unlink($audioPath);
            }
            $sousCategorie->audio = null;
        }
        // Suppression de la vidéo si demandé
        if ($request->has('delete_video') && $sousCategorie->video) {
            $videoPath = public_path('uploads/' . $sousCategorie->video);
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }
            $sousCategorie->video = null;
        }

        // Upload image si nouveau fichier
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $sousCategorie->image = $imageName;
        }
        // Upload audio si nouveau fichier
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $audioName = time() . '_' . $audio->getClientOriginalName();
            $audio->move(public_path('uploads'), $audioName);
            $sousCategorie->audio = $audioName;
        }
        // Upload video si nouveau fichier
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('uploads'), $videoName);
            $sousCategorie->video = $videoName;
        }

        $sousCategorie->save();
        return redirect()->route('admin.sous_categories.index')->with('success', 'Sous-catégorie mise à jour avec succès');
    }

    public function destroy($id)
    {
        $sousCategorie = SousCategorie::findOrFail($id);
        $sousCategorie->delete();
        return redirect()->route('admin.sous_categories.index')->with('success', 'Sous-catégorie supprimée avec succès');
    }
}

