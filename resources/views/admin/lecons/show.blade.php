@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">{{ $lecon->title }}</h1>
        <div>
            <a href="{{ route('admin.lecons.edit', $lecon) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>
                Modifier
            </a>
            <a href="{{ route('admin.lecons.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Retour à la liste
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <p class="card-text">{{ $lecon->description }}</p>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Contenu</h5>
                    <div class="card-text">
                        {!! nl2br(e($lecon->content)) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Informations</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <strong><i class="fas fa-folder me-2"></i>Sous-catégorie :</strong>
                            <span>{{ $lecon->sousCategorie->name }}</span>
                        </li>
                        <li class="mb-2">
                            <strong><i class="fas fa-clock me-2"></i>Durée :</strong>
                            <span>{{ $lecon->duration }} minutes</span>
                        </li>
                        <li class="mb-2">
                            <strong><i class="fas fa-signal me-2"></i>Niveau :</strong>
                            <span>{{ $lecon->difficulty_level }}</span>
                        </li>
                        <li class="mb-2">
                            <strong><i class="fas fa-calendar me-2"></i>Créée le :</strong>
                            <span>{{ $lecon->created_at->format('d/m/Y H:i') }}</span>
                        </li>
                        <li class="mb-2">
                            <strong><i class="fas fa-sync me-2"></i>Dernière modification :</strong>
                            <span>{{ $lecon->updated_at->format('d/m/Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            @if($lecon->resources)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Ressources</h5>
                        <ul class="list-unstyled">
                            @foreach(explode("\n", $lecon->resources) as $resource)
                                @if(trim($resource))
                                    <li class="mb-2">
                                        <a href="{{ trim($resource) }}" target="_blank" class="text-decoration-none">
                                            <i class="fas fa-external-link-alt me-2"></i>
                                            {{ trim($resource) }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 