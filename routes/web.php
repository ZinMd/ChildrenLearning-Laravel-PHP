<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\SousCategorieController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;

// Routes d'authentification
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', function() { return redirect('login'); });
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/decouvrir', [CategorieController::class, 'publicIndex'])->name('categories.public.index');
Route::get('/categories/{categorie}', [CategorieController::class, 'showPublic'])->name('categories.public.show');

// Routes pour l'espace enfant
Route::get('/enfant', [EnfantController::class, 'index'])->name('enfant.index');
Route::get('/espace/enfant', [ContenuController::class, 'afficherContenuPourEnfant'])->name('enfant.espace');

// Routes pour l'administration
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // Gestion des catégories
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');

    // Gestion des sous-catégories
    Route::get('/sous_categories', [SousCategorieController::class, 'index'])->name('sous_categories.index');
    Route::get('/sous_categories/create', [SousCategorieController::class, 'create'])->name('sous_categories.create');
    Route::post('/sous_categories', [SousCategorieController::class, 'store'])->name('sous_categories.store');
    Route::get('/sous_categories/{sousCategorie}/edit', [SousCategorieController::class, 'edit'])->name('sous_categories.edit');
    Route::put('/sous_categories/{sousCategorie}', [SousCategorieController::class, 'update'])->name('sous_categories.update');
    Route::delete('/sous_categories/{sousCategorie}', [SousCategorieController::class, 'destroy'])->name('sous_categories.destroy');
    Route::get('/sous_categories/{sousCategorie}', [SousCategorieController::class, 'show'])->name('sous_categories.show');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


