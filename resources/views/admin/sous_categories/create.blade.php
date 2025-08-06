<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Sous-Catégorie - Administration</title>
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
        .form-control {
            border-radius: 12px;
            padding: 0.8rem;
            border: 2px solid #e9ecef;
        }
        .form-control:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }
        .btn-submit {
            border-radius: 12px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
        }
        .media-preview {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 1rem;
            display: none;
        }
        .audio-preview {
            width: 100%;
            margin-top: 1rem;
        }
        .video-preview {
            width: 100%;
            height: 200px;
            border-radius: 10px;
            margin-top: 1rem;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="admin-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="admin-title">Créer une Nouvelle Sous-Catégorie</h2>
                <a href="{{ route('admin.sous_categories.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.sous_categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la Sous-Catégorie</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                </div>

                <div class="mb-3">
                    <label for="categorie_id" class="form-label">Catégorie Parent</label>
                    <select class="form-control" id="categorie_id" name="categorie_id" required>
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description (optionnel)</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image (optionnel)</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <img id="imagePreview" class="media-preview" src="#" alt="Aperçu de l'image" style="display: none;">
                </div>

                <div class="mb-3">
                    <label for="audio" class="form-label">Audio (optionnel)</label>
                    <input type="file" class="form-control" id="audio" name="audio" accept="audio/*">
                    <audio id="audioPreview" class="audio-preview" controls style="display: none;">
                        <source src="#" type="audio/mpeg">
                    </audio>
                </div>

                <div class="mb-3">
                    <label for="video" class="form-label">Vidéo (optionnel)</label>
                    <input type="file" class="form-control" id="video" name="video" accept="video/*">
                    <video id="videoPreview" class="video-preview" controls style="display: none;">
                        <source src="#" type="video/mp4">
                    </video>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-submit">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Prévisualisation de l'image
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        // Prévisualisation de l'audio
        document.getElementById('audio').addEventListener('change', function(e) {
            const preview = document.getElementById('audioPreview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.querySelector('source').src = e.target.result;
                    preview.style.display = 'block';
                    preview.load();
                }
                reader.readAsDataURL(file);
            }
        });

        // Prévisualisation de la vidéo
        document.getElementById('video').addEventListener('change', function(e) {
            const preview = document.getElementById('videoPreview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.querySelector('source').src = e.target.result;
                    preview.style.display = 'block';
                    preview.load();
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>

