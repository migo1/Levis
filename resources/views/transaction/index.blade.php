@extends('layouts.master')

@section('content')

<a href="{{ route('transactions.create')}}" class="btn btn-success">Create Transacrion</a>

<div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Transaction's Table<a class="btn btn-success btn-flat btn-sm m-0 float-right" href="{{ route('clients.create')}}">Add New Client</a></h3>
      
      
            </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>No</th>

            <th>Transaction</th>

          </tr>
          @foreach ($transactions as $transaction)
          <tr>
            <td>{{++$i}}</td>

            <td>{{ $transaction->name }}</td>

            <td>
                <a class="btn btn-primary btn-flat btn-sm" href="#">Edit</a>
                 {!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
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