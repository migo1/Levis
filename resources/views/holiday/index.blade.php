@extends('layouts.master')

@section('content')
    

<div class="row ">
    <div class="col-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title">Holidays's Table<button type="button" class="btn btn-sm btn-flat btn-success float-right" data-toggle="modal" data-target="#add_holiday">Add Holiday</button></h3>
  
  
        </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
      <tr>
        <th>No</th>

        <th>Holiday</th>
        <th>Date</th>
        <th>Action</th>

      </tr>
      @foreach ($holidays as $holiday)
      <tr>
        <td>{{++$i}}</td>

        <td>{{ $holiday->holiday_name }}</td>
        <td>{{ \Carbon\Carbon::parse($holiday->holiday_date)->format('d M') }}</td>


        <td>
     {{--   <a class="btn btn-primary btn-flat btn-sm" href="/transactions/{{$transaction->id}}/edit">Edit</a>
             {!! Form::open(['method' => 'DELETE','route' => ['transactions.destroy', $transaction->id],'style'=>'display:inline']) !!}
                 {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
             {!! Form::close() !!}--}}
        </td>
      </tr>
      @endforeach
    </table>
    {{$holidays->links()}}
  </div>


</div>
<!-- /.card -->
</div>
</div><!-- /.row -->

    <!-- Modal add_holiday-->
    <div class="modal fade" id="add_holiday" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Holiday</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('holidays.store')}}">
            <div class="modal-body">
              @csrf
              @include('holiday.create')
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