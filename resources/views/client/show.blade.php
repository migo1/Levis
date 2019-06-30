@extends('layouts.master')


@section('content')
    
<div class="container-fluid">
<a class="btn btn-info btn-flat  mb-2" href="{{ route('clients.index')}}"><i class="fas fa-hand-point-left fa-lg mr-2"></i>Clients</a>
        <div class="row">
          <div class="col-md-3">
  
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/img/owner.png"
                       alt="User profile picture">
                </div>
  
                <h3 class="profile-username text-center">{{$client->name}}</h3>
  
            <p class="text-muted text-center">{{$client->email}}</p>
  
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <b>Client since:</b> <a class="float-right">{{$client->created_at->diffForHumans()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact:</b> <a class="float-right">{{$client->mobile_no}}</a>
                  </li>
                  <li class="list-group-item">
                      <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>
                      <p class="text-muted">Nairobi, Kenya</p>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">

                    <div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">{{ $client->name}}'s Files
                  <button type="button" class="btn btn-success btn-flat btn-sm m-0 float-right" data-toggle="modal" data-target="#create_file">
                      Add New File
                    </button>
              </h3>
      
            </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>Date</th>
            <th>Description</th>
            <th>reference</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
          @foreach ($client->files as $file)
          <tr>
            <td>{{ $file->court_day }}</td>
          <td>{{ $file->description}}</td>
          <td>{{ $file->reference}}</td>
          <td>{{ $file->transaction->name}}</td>

            <td>
            <button class="btn btn-primary btn-flat btn-sm" 

            data-myflid="{{ $file->id }}" data-mytrid="{{ $file->transaction}}" data-mycourtday="{{ $file->court_day }}"
            data-mydescription="{{ $file->description}}" data-myclid="{{ $file->client_id}}" data-myreference="{{ $file->reference}}"

            data-toggle="modal" data-target="#edit_file">
              Edit</button>
              <button class="btn btn-danger btn-sm btn-flat"
              data-myflid="{{ $file->id }}"
              data-toggle="modal" data-target="#delete_file">
                Delete
              </button>
                {{-- {!! Form::open(['method' => 'DELETE','route' => ['files.destroy', $file->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                 {!! Form::close() !!}--}}
            </td>
          </tr>
          @endforeach
        </table>
       {{-- {{$files->links()}}--}}
      </div>
    
    
    </div>
    <!-- /.card -->
    </div>
    </div><!-- /.row -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>


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
          @include('client.create_file')
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <!-- Modal edit_file-->
  <div class="modal fade" id="delete_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Delete File</h5>
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
       
        var modal = $(this)
        modal.find('.modal-body #file_id').val(file_id)
        modal.find('.modal-body #transaction_id').val(transaction_id)
        modal.find('.modal-body #court_day').val(court_day)
        modal.find('.modal-body #description').val(description)
        modal.find('.modal-body #client_id').val(client_id)
         modal.find('.modal-body #reference').val(reference)
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