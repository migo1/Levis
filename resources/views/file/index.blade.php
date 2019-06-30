@extends('layouts.master')


@section('content')
    
<div class="row ">
        <div class="col-12">
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
            <th>Action</th>
          </tr>
          @foreach ($files as $file)
          <tr>
            <td>{{++$i}}</td>
            <td>{{ $file->client->uuid}}</td>
            <td>{{ $file->client->name }}</td>
            <td>{{ $file->transaction->name }}</td>
            <td>{{ $file->reference}}</td>
            <td>
            <a class="btn btn-info btn-flat btn-sm" href="#">Show</a>
                <a class="btn btn-primary btn-flat btn-sm" href="#">Edit</a>
                 {!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                 {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </table>
        {{$files->links()}}
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

@endsection