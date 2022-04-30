<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['designation','prix','quantite','marque','categorie_id'];
    
    protected $primaryKey ='id';
        
    public function categorie()
        { 
        return $this->belongsTo('App\Models\Categorie'); 
        }



}
