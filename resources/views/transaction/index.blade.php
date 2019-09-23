@extends('layouts.master')

@section('content')


<div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Case Types<a class="btn btn-success btn-flat btn-sm m-0 float-right" href="{{ route('transactions.create')}}">Create New Case Type</a></h3>
      
      
            </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>No</th>

            <th>case type</th>

          </tr>
          @foreach ($transactions as $transaction)
          <tr>
            <td>{{++$i}}</td>

            <td>{{ $transaction->name }}</td>

            <td>
            <a class="btn btn-primary btn-flat btn-sm" href="/transactions/{{$transaction->id}}/edit">Edit</a>
                 {!! Form::open(['method' => 'DELETE','route' => ['transactions.destroy', $transaction->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                 {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </table>
        {{$transactions->links()}}
      </div>
    
    
    </div>
    <!-- /.card -->
    </div>
    </div><!-- /.row -->

@endsection