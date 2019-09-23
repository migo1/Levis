@extends('layouts.master')

@section('content')


<div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Parties Involved<button class="btn btn-success btn-flat btn-sm m-0 float-right" data-toggle="modal" data-target="#add_party">Add a party</button></h3>
      
      
            </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>

            <th>parties</th>

          </tr>
         @foreach ($transaction->parties as $transact)
          <tr>

          <td>{{ $transact->name }}</td>

            <td>
               {{-- <a class="btn btn-primary btn-flat btn-sm" href="/transactions/{{$transaction->id}}">View</a>
            <a class="btn btn-primary btn-flat btn-sm" href="/transactions/{{$transaction->id}}/edit">Edit</a>
                 {!! Form::open(['method' => 'DELETE','route' => ['transactions.destroy', $transaction->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                 {!! Form::close() !!}--}}
            </td>
          </tr>
         @endforeach
        </table>
      {{--  {{$transactions->links()}}--}}
      </div>
    
    
    </div>
    <!-- /.card -->
    </div>
    </div><!-- /.row -->


    <!-- Modal add_holiday-->
    <div class="modal fade" id="add_party" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Party</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="POST" action="{{ route('parties.store')}}">
          <div class="modal-body">
            @csrf
            @include('party.create')
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