@extends('layouts.app')
@section('content')





<div class="row">

<div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ajouter Bon de commande fournisseur</h3>
            </div>
            <div class="card-body">
                <form class="row g-2 needs-validation" novalidate action="{{ url('bon_commande_frs') }}" method="post" >
                    {!! csrf_field() !!}
                    <div class="col-md-5">
                        <label for="desc" class="form-label">Description</label>
                                    <input type="text" name="desc" id="desc" class="form-control" required="">
                        <div class="valid-feedback">
                        
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="fournisseur_id" class="form-label">Fournisseur</label>
                        <!-- name="fournisseur_num" -->
                        <select class="form-control" id="fournisseur_id" name="fournisseur_id" required="">

                            @foreach($fournisseurs as $fournisseur)
                                    <!-- value="{"{$fournisseur->id}}" -->
                                <option value="{{$fournisseur->id}}" >{{$fournisseur->id}} - {{ $fournisseur->nom_prenom }}</option>

                            @endforeach

                        </select>
                       <div class="invalid-feedback">
                        Please select a valid state.
                        </div>
                    </div><div> <br><br></div>
                    
                    <div class="col-md-5">
                        <label for="dat_com" class="form-label">Date de création </label>
                        <input type="datetime-local" name="dat_com" id="dat_com" class="form-control" required="">
                        <div class="invalid-feedback">
                        Please provide a valid date.
                        </div>
                    </div> 
                    <div class="col-md-5">
                        <label for="dat_exp" class="form-label">Date d'expiration' </label>
                        <input type="date" name="dat_exp" id="dat_com" class="form-control" required="">
                        <div class="invalid-feedback">
                        Please provide a valid date.
                    </div>
                    
                    <br><br><br>
                    <div class="col-8">
                        <button class="btn btn-primary" type="submit">Ajouter</button> 
                    </div>
                    
                    </form>
            </div>
        </div>
	</div>
 </div>
@endsection