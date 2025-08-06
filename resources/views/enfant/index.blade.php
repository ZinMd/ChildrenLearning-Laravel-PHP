@extends('layouts.app') <!-- Si tu n’as pas de layout, enlève cette ligne -->

@section('content')
<div class="container mt-4">
   <h2 class="text-center mb-4">Espace Enfant - Apprentissage</h2>

   <div class="row">
       @foreach($contenus as $contenu)
           <div class="col-md-4">
               <div class="card mb-3 shadow-sm">
                   <div class="card-body">
                       <h5 class="card-title">{{ $contenu->titre }}</h5>
                       <p class="card-text">{{ $contenu->description }}</p>
                       @if($contenu->lien_fichier)
                           <a href="{{ asset('storage/' . $contenu->lien_fichier) }}" class="btn btn-primary" target="_blank">Voir le contenu</a>
                       @endif
                   </div>
               </div>
           </div>
       @endforeach
   </div>
</div>
@endsection