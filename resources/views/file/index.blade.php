@extends('layouts.master')


@section('content')
    
<div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Files Table<a class="btn btn-success btn-flat btn-sm m-0 float-right" href="{{ route('clients.create')}}">Add New File</a></h3>
      
      
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

@endsection