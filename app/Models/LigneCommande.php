<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    protected $table = 'lignes_commandes';
    protected $primaryKey = 'id';
    protected $fillable = ['produit','pu','qte','mont_Ht','produit_id','commande_id'];

   
}

