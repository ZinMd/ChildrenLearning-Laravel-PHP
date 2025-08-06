@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Nouvelle Leçon</h1>
        <a href="{{ route('admin.lecons.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Retour à la liste
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.lecons.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre de la leçon</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sous_categorie_id" class="form-label">Sous-catégorie</label>
                            <select class="form-select @error('sous_categorie_id') is-invalid @enderror" id="sous_categorie_id" name="sous_categorie_id" required>
                                <option value="">Sélectionnez une sous-catégorie</option>
                                @foreach($categories as $categorie)
                                    <optgroup label="{{ $categorie->name }}">
                                        @foreach($categorie->sousCategories as $sousCategorie)
                                            <option value="{{ $sousCategorie->id }}" {{ old('sous_categorie_id') == $sousCategorie->id ? 'selected' : '' }}>
                                                {{ $sousCategorie->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('sous_categorie_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Contenu de la leçon</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Durée (en minutes)</label>
                            <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration') }}" min="1" required>
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="difficulty_level" class="form-label">Niveau de difficulté</label>
                            <select class="form-select @error('difficulty_level') is-invalid @enderror" id="difficulty_level" name="difficulty_level" required>
                                <option value="">Sélectionnez un niveau</option>
                                <option value="Débutant" {{ old('difficulty_level') == 'Débutant' ? 'selected' : '' }}>Débutant</option>
                                <option value="Intermédiaire" {{ old('difficulty_level') == 'Intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                                <option value="Avancé" {{ old('difficulty_level') == 'Avancé' ? 'selected' : '' }}>Avancé</option>
                            </select>
                            @error('difficulty_level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="resources" class="form-label">Ressources (une par ligne)</label>
                            <textarea class="form-control @error('resources') is-invalid @enderror" id="resources" name="resources" rows="5">{{ old('resources') }}</textarea>
                            <small class="text-muted">Format : Nom de la ressource|URL</small>
                            @error('resources')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 