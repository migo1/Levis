@extends('layouts.master')

@section('content')

<div class="row ">
    <div class="col-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title">Client's Table
            <button type="button" class="btn btn-success btn-flat btn-sm m-0 float-right" data-toggle="modal" data-target="#create">
            Add New Client
          </button></h3>
        </div>

<div class="card-body table-responsive p-0">
    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Client's Code</th>
        <th>Name</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Action</th>
      </tr>
      @foreach ($clients as $client)
      <tr>
        <td>{{++$i}}</td>
        <td>{{ $client->uuid}}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>{{$client->mobile_no}}</td>
        <td>
        <a class="btn btn-info btn-flat btn-sm" href="/clients/{{$client->id}}">Client's Page</a>
            <button class="btn btn-primary btn-flat btn-sm"
      data-myclid="{{$client->id}}"  data-myuuid="{{ $client->uuid}}" data-myname="{{ $client->name }}" 
        data-myemail="{{ $client->email }}" data-mymobile="{{$client->mobile_no}}"
              data-toggle="modal" data-target="#edit">
              Edit</button>

            <button class="btn btn-danger btn-flat btn-sm"
            data-myclid="{{$client->id}}"
             data-toggle="modal" data-target="#delete">
             Delete</button>

        </td>
      </tr>
      @endforeach
    </table>
    {{$clients->links()}}
  </div>


</div>
<!-- /.card -->
</div>
</div><!-- /.row -->




<!-- Modal create-->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('clients.store')}}">
        @csrf
      <div class="modal-body">
        
        @include('client.create')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('clients.update','test')}}">
          {{method_field('patch')}}
          @csrf
        <div class="modal-body">
        <input type="hidden" name="client_id" id="client_id" value="">
          
          @include('client.edit')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>



  <!-- Modal delete-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('clients.destroy','test')}}">
        {{method_field('delete')}}
        @csrf
      <div class="modal-body mt-0 mb-0">
        <p class="text-center">
          Are you sure you want to delete this?
        </p>
      <input type="hidden" name="client_id" id="client_id" value="">
      
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm btn-flat" data-dismiss="modal">No, Cancel</button>
        <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Delete</button>
      </div>
    </form>
    </div>
  </div>
</div>
  

  <script>
  $('#edit').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var client_id = button.data('myclid')
  var uuid = button.data('myuuid')
  var name = button.data('myname') 
  var email = button.data('myemail')
  var mobile = button.data('mymobile')
 
  var modal = $(this)
  modal.find('.modal-body #client_id').val(client_id)
  modal.find('.modal-body #uuid').val(uuid)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #mobile').val(mobile)
})
  </script>

<script>
    $('#delete').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget) 
    var client_id = button.data('myclid')

    var modal = $(this)
    modal.find('.modal-body #client_id').val(client_id)

  })
    </script>
@endsection