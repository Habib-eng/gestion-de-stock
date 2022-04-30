@extends('layouts.app') <!-- Nom de dossier qui contients les vues et le nom de fichier layout -->
@section('content')
 
 
  <div class="card">
    <div class="card-header">Commandeus Page</div>
    <div class="card-body">
    
  
          <div class="card-body">
          <h5 class="card-title">Numéro de commande : {{ $bon_commande_frs->id   }} </h5> 
          <h5 class="card-title">Déscription de commande : {{ $bon_commande_frs->desc }}</h5>
          <p class="card-text">Date de création de Bon de commande : {{ $bon_commande_frs->dat_com }}</p>
          <p class="card-text">Date d'expiration de Bon de commande : {{ $bon_commande_frs->dat_exp }}</p>
          <p class="card-text">Fournisseur: {{ $bon_commande_frs->fournisseur }}</p>

    </div>
        
      <hr>
    
    </div>
  </div>
@endsection