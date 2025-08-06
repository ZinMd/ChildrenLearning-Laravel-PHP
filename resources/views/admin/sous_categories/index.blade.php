<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Sous-Catégories - Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Comic Neue', cursive;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .admin-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }
        .admin-title {
            color: #2c3e50;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }
        .table th {
            background: #4A90E2;
            color: white;
        }
        .btn-action {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="admin-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="admin-title">Gestion des Sous-Catégories</h2>
                <a href="{{ route('admin.sous_categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Ajouter une Sous-Catégorie
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Catégorie Parent</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sousCategories as $sousCategorie)
                            <tr>
                                <td>{{ $sousCategorie->nom }}</td>
                                <td>{{ $sousCategorie->categorie->nom }}</td>
                                <td>{{ $sousCategorie->description }}</td>
                                <td>
                                    <a href="{{ route('admin.sous_categories.edit', $sousCategorie->id) }}" class="btn btn-warning btn-action">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.sous_categories.destroy', $sousCategorie->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-catégorie ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
