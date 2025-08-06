<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin - Apprentissage Enfant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
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
        .admin-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin: 1rem;
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .admin-card:hover {
            transform: translateY(-5px);
        }
        .btn-admin {
            border-radius: 12px;
            padding: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .btn-admin:hover {
            transform: scale(1.05);
        }
        .icon-container {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="admin-container">
            <h2 class="text-center admin-title">Tableau de Bord - Administration</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="admin-card text-center">
                        <div class="icon-container">
                            📚
                        </div>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-admin btn-outline-primary w-100">
                            Gestion des Catégories
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="admin-card text-center">
                        <div class="icon-container">
                            📂
                        </div>
                        <a href="{{ route('admin.sous_categories.index') }}" class="btn btn-admin btn-outline-warning w-100">
                            Gestion des Sous-Catégories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
