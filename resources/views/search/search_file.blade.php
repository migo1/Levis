@extends('layouts.master')


@section('content')
    
<div class="row ">
<div class="col-md-2"><br>
    <a class="btn btn-success btn-sm btn-flat" href="{{ url('/file_search')}}">Refresh Page</a>
    <form action="{{ route('search') }}" method="GET">
        <h3>File Search</h3>  
        <label>Client's Name :</label>     
        <select name="client_id" class="form-control">
                <option value="0"></option>
            @foreach ($clients as $client)
        <option value="{{$client->id}}">{{$client->name}}</option>                                   
            @endforeach
        </select><br>  
        <label>Court Case :</label>
        <select name="transaction_id" class="form-control">
                <option value="0"></option>
            @foreach ($transactions as $transaction)
        <option value="{{$transaction->id}}">{{$transaction->name}}</option>                                   
            @endforeach
        </select><br>  
        <label>Case Date :</label>   
        <input type="text" name="court_day" class="form-control" placeholder="Date"><br>       
        <label>Reference Number:</label>
        <input type="text" name="reference" class="form-control" placeholder="reference number">       
 <br>       
        <input type="submit" value="Search" class="btn btn-secondary">       
        </form>

      </div>
        <div class="col-md-10">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Files Table
                
                  <button type="button" class="btn btn-success btn-flat btn-sm m-0 float-right" data-toggle="modal" data-target="#create_file">
                      Add New File
                    </button>      
      
            </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>Client's Code</th>
            <th>Client's Name</th>
            <th>Transaction</th>
            <th>Reference</th>
            <th >Action</th>
          </tr>
          @foreach ($data as $file)
          <tr>
            <td>{{++$i}}</td>
            <td>{{ $file->client->uuid}}</td>
            <td>{{ $file->client->name }}</td>
            <td>{{ $file->transaction->name }}</td>
            <td>{{ $file->reference}}</td>
            <td style="width:23%">
 @can('file-edit')
 <button class="btn btn-primary btn-flat btn-sm"     

 data-myflid="{{ $file->id }}" data-mytrid="{{ $file->transaction_id}}" data-mycourtday="{{ $file->court_day }}"
 data-mydescription="{{ $file->description}}" data-myclid="{{ $file->client_id}}" data-myreference="{{ $file->reference}}" 
 data-myrequest="{{ $file->request }}" data-myreason="{{ $file->reason }}" data-myuid="{{ $file->user_id }}"
  data-myreq_rep="{{ $file->request_reply }}" data-myre_rep="{{ $file->reason_reply }}"

 data-toggle="modal" data-target="#edit_file">
 Edit</button>


   <button class="btn btn-danger btn-sm btn-flat"
   data-myflid="{{ $file->id }}"
   data-toggle="modal" data-target="#delete_file">
   Delete
   </button>
 @endcan

                @can('view-file')
                <button class="btn btn-flat btn-sm btn-warning"

                data-myflid="{{ $file->id }}" data-mytrid="{{ $file->transaction_id}}" data-mycourtday="{{ $file->court_day }}"
                data-mydescription="{{ $file->description}}" data-myclid="{{ $file->client_id}}" data-myreference="{{ $file->reference}}" 
                data-myrequest="{{ $file->request }}" data-myreason="{{ $file->reason }}" data-myuid="{{ $file->user_id }}"
                 data-myreq_rep="{{ $file->request_reply }}" data-myre_rep="{{ $file->reason_reply }}"
               
                data-toggle="modal" data-target="#request_file">
                Request</button>
                @endcan
                </td>
           {{-- <td>
            <a class="btn btn-info btn-flat btn-sm" href="#">Show</a>
                <a class="btn btn-primary btn-flat btn-sm" href="#">Edit</a>
                 {!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                 {!! Form::close() !!}
            </td>--}}
          </tr>
          @endforeach
        </table>
        {{$data->links()}}
      </div>
    
    
    </div>
    <!-- /.card -->
    </div>
    </div><!-- /.row -->

    <!-- Modal create_file-->
<div class="modal fade" id="create_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('files.store')}}">
        <div class="modal-body">
          @csrf
          @include('file.create_file')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-flat">Create</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <!-- Modal edit_file-->
  <div class="modal fade" id="edit_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('files.update','test')}}">
            {{method_field('patch')}}
          <div class="modal-body">
          <input type="hidden" name="file_id" id="file_id" value="">
            @csrf
            @include('client.file_edit')
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-flat btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-flat btn-primary">Update File</button>
          </div>
        </form>
        </div>
      </div>
    </div>



  <!-- Modal request_file-->
  <div class="modal fade" id="request_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('files.update','test')}}">
          {{method_field('patch')}}
        <div class="modal-body">
        <input type="hidden" name="file_id" id="file_id" value="">
          @csrf
          @include('search.request_file')
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-flat btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-flat btn-primary">Request File</button>
        </div>
      </form>
      </div>
    </div>
  </div>


    <!-- Modal delete_file-->
  <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('files.destroy','test')}}">
            {{method_field('delete')}}
            @csrf

          <div class="modal-body">
          <p class="text-center">
            Are you sure you want to delete this file?
          </p>

          <input type="hidden" name="file_id" id="file_id" value="">

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
        $('#edit_file').on('show.bs.modal', function (event) {
      
        var button = $(event.relatedTarget) 
        var file_id = button.data('myflid')
        var transaction_id = button.data('mytrid')
        var court_day = button.data('mycourtday') 
        var description = button.data('mydescription')
        var client_id = button.data('myclid')
        var reference = button.data('myreference')
        var request = button.data('myrequest')
        var reason = button.data('myreason')
        var user_id = button.data('myuid')
        var request_reply = button.data('myreq_rep')
        var reason_reply = button.data('myre_rep')
       
        var modal = $(this)
        modal.find('.modal-body #file_id').val(file_id)
        modal.find('.modal-body #transaction_id').val(transaction_id)
        modal.find('.modal-body #court_day').val(court_day)
        modal.find('.modal-body #description').val(description)
        modal.find('.modal-body #client_id').val(client_id)
        modal.find('.modal-body #reference').val(reference)
        modal.find('.modal-body #request').val(request)
        modal.find('.modal-body #reason').val(reason)
        modal.find('.modal-body #user_id').val(user_id)
        modal.find('.modal-body #request_reply').val(request_reply)
        modal.find('.modal-body #reason_reply').val(reason_reply)

      })
        </script>

<script>
  $('#request_file').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var file_id = button.data('myflid')
  var transaction_id = button.data('mytrid')
  var court_day = button.data('mycourtday') 
  var description = button.data('mydescription')
  var client_id = button.data('myclid')
  var reference = button.data('myreference')
  var request = button.data('myrequest')
  var reason = button.data('myreason')
  var user_id = button.data('myuid')
  var request_reply = button.data('myreq_rep')
  var reason_reply = button.data('myre_rep')
 
  var modal = $(this)
  modal.find('.modal-body #file_id').val(file_id)
  modal.find('.modal-body #transaction_id').val(transaction_id)
  modal.find('.modal-body #court_day').val(court_day)
  modal.find('.modal-body #description').val(description)
  modal.find('.modal-body #client_id').val(client_id)
  modal.find('.modal-body #reference').val(reference)
  modal.find('.modal-body #request').val(request)
  modal.find('.modal-body #reason').val(reason)
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #request_reply').val(request_reply)
  modal.find('.modal-body #reason_reply').val(reason_reply)

})
  </script>

<script>
    $('#delete_file').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget) 
    var file_id = button.data('myflid')
   
    var modal = $(this)
    modal.find('.modal-body #file_id').val(file_id)
  })
    </script>

@endsection