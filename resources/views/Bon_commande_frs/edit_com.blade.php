@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">Modifier Bon de commande</div>
    @if ($message = Session :: get ('msg')) 
      <div class="alert alert-success">
      {{$message}}
      </div>
    @endif
  <div class="card-body">
      
      <form action="{{ url('bon_commande_frs/' .$bon_commande_frs->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$bon_commande_frs->id}}" id="id" />
        <label>Description</label></br>
        <input type="text" name="desc" id="desc" value="{{$bon_commande_frs->desc}}" class="form-control"></br>
        <label>Date de création</label></br>
        <input type="text" name="dat_com" id="dat_com" value="{{$bon_commande_frs->dat_com}}" class="form-control"></br>
        <label>Date d'expiration</label></br>
        <input type="text" name="dat_exp" id="dat_exp" value="{{$bon_commande_frs->dat_exp}}" class="form-control"></br>
        <label>Fournisseur</label></br>
        <input type="text" name="fournisseur" id="fournisseur" value="{{$bon_commande_frs->fournisseur}} " class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop