@extends('layouts.master')

@section('content')
    




<div class="row ">
    <div class="col-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title">Client's Table<a class="btn btn-success btn-flat btn-sm m-0 float-right" href="{{ route('clients.create')}}">Add New Client</a></h3>
  
  
        </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Client's Code</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      @foreach ($clients as $client)
      <tr>
        <td>{{++$i}}</td>
        <td>{{ $client->uuid}}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>
        <a class="btn btn-info btn-flat btn-sm" href="/clients/{{$client->id}}">Show</a>
            <a class="btn btn-primary btn-flat btn-sm" href="#">Edit</a>
             {!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
                 {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
             {!! Form::close() !!}
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
@endsection