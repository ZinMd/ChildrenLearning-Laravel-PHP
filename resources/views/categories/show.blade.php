<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categorie->nom }} - Sous-catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Comic Neue', cursive;
            background-color: #E8F5FE;
            min-height: 100vh;
            color: #2C3E50;
        }
        .category-title {
            font-family: 'Bubblegum Sans', cursive;
            font-size: 2.5rem;
            color: #2C3E50;
            margin-bottom: 2rem;
            text-align: center;
        }
        .sous-categorie-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .media-preview {
            max-width: 100%;
            max-height: 200px;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        .audio-preview {
            width: 100%;
            margin-bottom: 1rem;
        }
        .video-preview {
            width: 100%;
            max-height: 200px;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        .back-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background: white;
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
            border: 2px solid #4A90E2;
            text-decoration: none;
            color: #2C3E50;
        }
        .back-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            background: #4A90E2;
            color: white;
            text-decoration: none;
        }
        .back-button i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="category-title">{{ $categorie->nom }}</h1>
        <div class="row">
            @forelse($categorie->sousCategories as $sousCategorie)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="sous-categorie-card">
                        <h4>{{ $sousCategorie->nom }}</h4>
                        <p>{{ $sousCategorie->description }}</p>
                        @if($sousCategorie->image)
                            <img src="{{ asset('uploads/' . $sousCategorie->image) }}" alt="Image" class="media-preview">
                        @endif
                        @if($sousCategorie->audio)
                            <audio controls class="audio-preview">
                                <source src="{{ asset('uploads/' . $sousCategorie->audio) }}" type="audio/mpeg">
                            </audio>
                        @endif
                        @if($sousCategorie->video)
                            <video controls class="video-preview">
                                <source src="{{ asset('uploads/' . $sousCategorie->video) }}" type="video/mp4">
                            </video>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Aucune sous-catégorie n'est disponible pour cette catégorie.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    <a href="{{ route('categories.public.index') }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Retour aux catégories
    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 