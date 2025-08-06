<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrir les Catégories - Apprentissage Enfant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #2ECC71;
            --accent-color: #F1C40F;
            --background-color: #E8F5FE;
            --text-color: #2C3E50;
        }

        body {
            font-family: 'Comic Neue', cursive;
            background-color: var(--background-color);
            min-height: 100vh;
            color: var(--text-color);
        }

        .category-section {
            background: white;
            padding: 50px 0;
            border-radius: 30px;
            margin: 50px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .category-item {
            background: white;
            border-radius: 25px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
            border: 3px dashed var(--secondary-color);
            position: relative;
            overflow: hidden;
        }

        .category-item::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(45deg);
            transition: all 0.5s ease;
            opacity: 0;
        }

        .category-item:hover::before {
            opacity: 1;
        }

        .category-item:hover {
            transform: translateY(-5px) rotate(1deg);
            border-style: solid;
            border-color: var(--accent-color);
            background: linear-gradient(135deg, white 0%, var(--background-color) 100%);
        }

        .category-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            color: var(--primary-color);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .category-item:hover .category-icon {
            transform: scale(1.2) rotate(-5deg);
            color: var(--accent-color);
        }

        .category-item h4 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            font-family: 'Bubblegum Sans', cursive;
            color: var(--text-color);
        }

        .category-item p {
            color: var(--text-color);
            font-size: 1.1rem;
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
            border: 2px solid var(--primary-color);
            text-decoration: none;
            color: var(--text-color);
        }

        .back-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            background: var(--primary-color);
            color: white;
            text-decoration: none;
        }

        .back-button i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <section id="categories" class="category-section">
        <div class="container">
            <h2 class="text-center mb-5">Découvre toutes les catégories !</h2>
            <div class="row">
                @forelse($categories as $category)
                    <div class="col-md-4 text-center mb-4">
                        <a href="{{ route('categories.public.show', $category->id) }}" style="text-decoration:none;color:inherit;">
                            <div class="category-item">
                                <div class="category-icon">
                                    <i class="fas {{ $category->icon ?? 'fa-folder' }}"></i>
                                </div>
                                <h4>{{ $category->nom }}</h4>
                                <p>{{ $category->description }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Aucune catégorie n'est disponible pour le moment.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <a href="{{ route('home') }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Retour à l'accueil
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 