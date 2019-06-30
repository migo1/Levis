@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('transactions.update', $transaction->id)}}">

    @method('PUT')
    {{ csrf_field()}}
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Type Of Transaction</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$transaction->name}}">
    </div>

  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection