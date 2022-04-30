@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bon de commande fournisseur</div>
                        @if ($message = Session :: get ('msg')) 
                            <div class="alert alert-success">
                            {{$message}}
                            </div>
                        @endif
                    <div class="card-body">
                        <a href="{{ url('/bon_commande_frs/create') }}" class="btn btn-success btn-sm" title="Ajouter une commande">
                            <i class="fa fa-plus" aria-hidden="true"></i> Créer une nouvelle commande fournisseur
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description </th>
                                        <th>Date de création</th>
                                        <th>Date d'expiration</th>
                                        <th>Fournisseur</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bon_commande_frs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>{{ $item->dat_com }}</td>
                                        <td>{{ $item->dat_exp }}</td>
                                        <td>{{ $item->fournisseur->nom_prenom }}</td>
                                      
                                        
 
                                        <td>
                                            <a href="{{ url('/bon_commande_frs/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Consulter</button></a>
                                            <a href="{{ url('/bon_commande_frs/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifir</button></a>
 
                                            <form method="POST" action="{{ url('/bon_commande_frs' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Commande" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection