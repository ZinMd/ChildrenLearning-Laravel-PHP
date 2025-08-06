@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Liste des Leçons</h1>
        <a href="{{ route('admin.lecons.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            Nouvelle Leçon
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Sous-catégorie</th>
                            <th>Durée</th>
                            <th>Niveau</th>
                            <th>Créée le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lecons as $lecon)
                            <tr>
                                <td>{{ $lecon->title }}</td>
                                <td>
                                    {{ $lecon->sousCategorie->name }}
                                    <small class="text-muted d-block">
                                        {{ $lecon->sousCategorie->categorie->name }}
                                    </small>
                                </td>
                                <td>{{ $lecon->duration }} minutes</td>
                                <td>
                                    <span class="badge bg-{{ $lecon->difficulty_level == 'Débutant' ? 'success' : ($lecon->difficulty_level == 'Intermédiaire' ? 'warning' : 'danger') }}">
                                        {{ $lecon->difficulty_level }}
                                    </span>
                                </td>
                                <td>{{ $lecon->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.lecons.show', $lecon) }}" class="btn btn-sm btn-info" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.lecons.edit', $lecon) }}" class="btn btn-sm btn-primary" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.lecons.destroy', $lecon) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette leçon ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucune leçon trouvée</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($lecons->hasPages())
                <div class="mt-4">
                    {{ $lecons->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 