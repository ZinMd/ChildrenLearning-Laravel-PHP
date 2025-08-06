<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion / Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
            padding: 2.5rem 2rem;
            max-width: 400px;
            width: 100%;
            margin: 2rem auto;
        }
        .auth-title {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: #2563eb;
            letter-spacing: 1px;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            border-radius: 12px;
            padding: 0.9rem 1rem;
            font-size: 1.1rem;
        }
        .btn-google {
            background: #fff;
            color: #ea4335;
            border: 2px solid #ea4335;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 1.2rem;
            transition: background 0.2s, color 0.2s;
        }
        .btn-google:hover {
            background: #ea4335;
            color: #fff;
        }
        .google-logo {
            width: 22px;
            height: 22px;
        }
        .switch-link {
            cursor: pointer;
            color: #2563eb;
            text-decoration: underline;
        }
        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #888;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-title" id="form-title">Connexion</div>
        <!-- Formulaire de Connexion -->
        <form id="login-form" method="POST" action="{{ route('login') }}" style="display: block;">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            <div class="mb-3 text-center">
                <a href="{{ route('google.login') }}" class="btn btn-google w-100">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/4a/Logo_2013_Google.png" alt="Google" class="google-logo">
                    Se connecter avec Google
                </a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            <div class="mt-3 text-center">
                <span>Pas de compte ? <span class="switch-link" onclick="showRegister()">Créer un compte</span></span>
            </div>
        </form>
        <!-- Formulaire d'inscription -->
        <form id="register-form" method="POST" action="{{ route('register') }}" style="display: none;">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email-register" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email-register" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-register" class="form-label">Mot de passe</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-register" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Créer un compte</button>
            <div class="mt-3 text-center">
                <span>Déjà un compte ? <span class="switch-link" onclick="showLogin()">Se connecter</span></span>
            </div>
        </form>
        <div class="auth-footer">
            &copy; {{ date('Y') }} Mon Site d'Apprentissage
        </div>
    </div>
    <script>
        function showRegister() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
            document.getElementById('form-title').innerText = 'Inscription';
        }
        function showLogin() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('form-title').innerText = 'Connexion';
        }
    </script>
</body>
</html> 