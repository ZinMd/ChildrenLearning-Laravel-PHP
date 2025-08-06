<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    protected $fillable = [
        'nom', 'description', 'categorie_id', 'image', 'audio', 'video'
    ];

    public function categorie()
    {
    return $this->belongsTo(Categorie::class);
    }
}
