

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@extends('layouts.app')
@section('content')

<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Lignes de commandes</h2>
        </div>
       <div><br></div>
        <div class="col-md-3">
            <label for="desc" class="form-label">Numéro de commande</label>
            <input type="text" name="date_com" id="date_com" class="form-control" required="">
            <div class="valid-feedback">
        
            </div>
        </div>
        <div class="col-md-4">
            <label for="desc" class="form-label">Date Commande</label>
            <input type="datetime-local" name="dat_com" id="dat_com" class="form-control" required="">            
            <div class="valid-feedback">
            
            </div>
        </div>
        <div><br><div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewBook" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Produit</th>
                  <th scope="col">Prix unitaire</th>
                  <th scope="col">Quantité</th>
                  <th scope="col">Montant hors taxe</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($lignes_commandes as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->produit }}</td>
                    <td>{{ $produit->pu }}</td>
                    <td>{{ $produit->qte }}</td>
                    <td>{{ $produit->mont_Ht }}</td>
                    <td>
                       <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $produit->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $produit->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {!! $lignes_commandes->links() !!}
        </div>
    </div>        
</div>

<!-- boostrap model -->
    <div class="modal fade" id="ajax-book-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxBookModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Produit</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="produit" name="produit" placeholder="Entrer produit" value="" maxlength="50" required="">
                </div>
              </div> 
 

              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Prix unitaire</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="pu" name="pu" placeholder="Entrer prix unitaire" value="" maxlength="50" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Quantité</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="qte" name="qte" placeholder="Entrer quantité" value="" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Montant hors taxe</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="mont_Ht" name="mont_Ht" placeholder="Entrer Montant hors taxe" value="" required="">
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
 $(document).ready(function($){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addNewBook').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#ajaxBookModel').html("Add Book");
       $('#ajax-book-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {

        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-book') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Book");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#produit').val(res.produit);
              $('#pu').val(res.pu);
              $('#qte').val(res.qte);
              $('#mont_Ht').val(res.Mont_Ht);
           }
        });

    });

    $('body').on('click', '.delete', function () {

       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-book') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){

              window.location.reload();
           }
        });
       }

    });

    $('body').on('click', '#btn-save', function (event) {

          var id = $("#id").val();
          var produit = $("#produit").val();
          var pu = $("#pu").val();
          var qte = $("#qte").val();
          var mont_Ht = $("#mont_Ht").val();

          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('storeLignes_commandes') }}",
            data: {
              id:id,
              produit:produit,
              pu:pu,
              qte:qte,
              mont_Ht:mont_Ht,
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });

    });

});
</script>
@endsection