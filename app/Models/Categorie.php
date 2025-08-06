<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Categorie extends Model
{
    public function sousCategories()
    {
    return $this->hasMany(SousCategorie::class);
    }
    use HasFactory;
    protected $fillable =['nom'];
}
