<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apprentissage pour Enfants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&family=Bubblegum+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary-color: #4A90E2; /* Bleu vif */
            --secondary-color: #2ECC71; /* Vert frais */
            --accent-color: #F1C40F; /* Jaune soleil */
            --background-color: #E8F5FE; /* Bleu très clair */
            --admin-color: #34495E; /* Bleu foncé */
            --text-color: #2C3E50; /* Bleu marine */
        }

        body {
            font-family: 'Comic Neue', cursive;
            background-color: var(--background-color);
            min-height: 100vh;
            color: var(--text-color);
        }

        h1, h2, h3, h4 {
            font-family: 'Bubblegum Sans', cursive;
            color: var(--text-color);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-family: 'Bubblegum Sans', cursive;
            font-size: 1.8rem;
            color: var(--text-color) !important;
        }

        .hero-section {
            background: var(--background-color);
            padding: 80px 0;
            border-radius: 0 0 30px 30px;
            position: relative;
            overflow: hidden;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .welcome-text {
            font-size: 3rem;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            animation: titleFloat 3s ease-in-out infinite;
        }

        @keyframes titleFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .hero-description {
            font-size: 1.5rem;
            color: var(--text-color);
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            font-family: 'Comic Neue', cursive;
        }

        .hero-image-container {
            position: relative;
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transform: perspective(1000px) rotateX(5deg);
            transition: all 0.5s ease;
        }

        .hero-image-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            opacity: 0.1;
            z-index: 1;
        }

        .hero-image-container:hover {
            transform: perspective(1000px) rotateX(0deg);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .hero-image {
            width: 100%;
            height: auto;
            display: block;
            border: 10px solid white;
            border-radius: 30px;
            transition: transform 0.5s ease;
        }

        .hero-image:hover {
            transform: scale(1.02);
        }

        .hero-decorations {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .decoration {
            position: absolute;
            font-size: 2rem;
            color: var(--accent-color);
            opacity: 0.2;
            animation: float 6s infinite ease-in-out;
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
        }

        .category-item p {
            color: var(--text-color);
            font-size: 1.1rem;
        }

        .admin-section {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: white;
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
            border: 2px solid var(--admin-color);
        }

        .admin-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            background: var(--admin-color);
        }

        .admin-link {
            display: flex;
            align-items: center;
            color: var(--admin-color);
            text-decoration: none;
            font-family: 'Bubblegum Sans', cursive;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .admin-section:hover .admin-link {
            color: white;
        }

        .admin-link i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .admin-section:hover .admin-link i {
            color: white;
        }

        .footer {
            background: white;
            color: var(--text-color);
            padding: 30px 0;
            margin-top: 50px;
            border-top: 5px solid var(--accent-color);
        }

        .bubble {
            position: absolute;
            background: var(--primary-color);
            border-radius: 50%;
            opacity: 0.15;
            animation: float 8s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
        }

        .category-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 3px dashed var(--secondary-color);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            color: var(--text-color);
        }

        .category-card::before {
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

        .category-card:hover::before {
            opacity: 1;
        }

        .category-card:hover {
            transform: translateY(-10px);
            border-style: solid;
            border-color: var(--accent-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: var(--text-color);
        }

        .category-icon-large {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon-large {
            transform: scale(1.2) rotate(5deg);
            color: var(--accent-color);
        }

        .category-title {
            font-family: 'Bubblegum Sans', cursive;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .category-description {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .category-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            background: var(--success-color);
            color: white;
            opacity: 0.9;
        }

        .categories-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .categories-title {
            font-size: 2.5rem;
            color: var(--text-color);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .categories-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            border-radius: 2px;
        }

        .categories-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .discover-all-btn {
            display: block;
            margin: 3rem auto;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            max-width: 300px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .discover-all-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            color: white;
            text-decoration: none;
        }

        .discover-all-btn i {
            margin-left: 10px;
            transition: transform 0.3s ease;
        }

        .discover-all-btn:hover i {
            transform: translateX(5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-child me-2" style="color: var(--primary-color);"></i>
                Apprentissage des enfants
            </a>
        </div>
    </nav>

    <!-- User info if authenticated -->
    @auth
    <div class="container mt-4 mb-2">
        <div class="d-flex align-items-center">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff" class="avatar me-2" alt="avatar" style="width:48px;height:48px;">
            <div>
                <div style="font-size:1.1rem; font-weight:600; color:#2563eb;">{{ Auth::user()->name }}</div>
                <div style="font-size:0.95rem; color:#888;">Connecté</div>
            </div>
        </div>
    </div>
    @endauth

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <h1 class="welcome-text animate__animated animate__fadeIn">Bienvenue dans le monde magique de l'apprentissage !</h1>
            <p class="hero-description animate__animated animate__fadeIn animate__delay-1s">
                Un endroit merveilleux où chaque enfant peut apprendre, découvrir et s'épanouir à travers des activités ludiques et éducatives.
            </p>
            <div class="hero-image-container animate__animated animate__fadeInUp animate__delay-1s">
                <img src="https://images.unsplash.com/photo-1485546246426-74dc88dec4d9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                     alt="Enfant souriant qui apprend" 
                     class="hero-image">
            </div>
        </div>
        <div class="hero-decorations">
            <i class="fas fa-star decoration" style="top: 15%; left: 10%;"></i>
            <i class="fas fa-pencil-alt decoration" style="top: 25%; right: 15%;"></i>
            <i class="fas fa-book decoration" style="bottom: 20%; left: 15%;"></i>
            <i class="fas fa-paint-brush decoration" style="bottom: 30%; right: 10%;"></i>
        </div>
        <div class="bubble" style="width: 50px; height: 50px; top: 20%; left: 10%;"></div>
        <div class="bubble" style="width: 30px; height: 30px; top: 60%; right: 15%;"></div>
        <div class="bubble" style="width: 40px; height: 40px; top: 30%; right: 30%;"></div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="category-section">
        <div class="container">
            <h2 class="text-center mb-5">Découvre ton monde merveilleux !</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="category-item">
                        <div class="category-icon">
                            <i class="fas fa-paw"></i>
                        </div>
                        <h4>Animaux</h4>
                        <p>Découvre le monde fascinant des animaux et de leurs habitats</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="category-item">
                        <div class="category-icon">
                            <i class="fas fa-font"></i>
                        </div>
                        <h4>Alphabet</h4>
                        <p>Apprends les lettres de l'alphabet de manière ludique et amusante</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="category-item">
                        <div class="category-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4>Maison & École</h4>
                        <p>Explore les objets du quotidien à la maison et à l'école</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('categories.public.index') }}" class="btn btn-primary discover-all-btn">
                    Découvrir toutes les catégories
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Apprentissage</h5>
                    <p>L'aventure de l'apprentissage commence ici !</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>&copy; 2025 Apprentissage. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Admin Section -->
    <div class="admin-section">
        <a href="{{ route('admin.dashboard') }}" class="admin-link">
            <i class="fas fa-lock"></i>
            Administration
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation des éléments au scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        });

        document.querySelectorAll('.category-item').forEach((el) => observer.observe(el));

        // Navigation vers les catégories
        function navigateToCategory(category) {
            window.location.href = `/category/${category}`;
        }

        // Ajout dynamique de bulles
        function createBubble() {
            const bubble = document.createElement('div');
            bubble.className = 'bubble';
            bubble.style.width = Math.random() * 30 + 20 + 'px';
            bubble.style.height = bubble.style.width;
            bubble.style.left = Math.random() * 100 + '%';
            bubble.style.top = Math.random() * 100 + '%';
            document.querySelector('.hero-section').appendChild(bubble);
            
            setTimeout(() => {
                bubble.remove();
            }, 8000);
        }

        setInterval(createBubble, 3000);
    </script>
</body>
</html>