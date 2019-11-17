{{--@extends('layouts.master')

@section('content')

<a href="{{ route('transactions.index')}}" class="btn btn-success mb-2">Back</a>

<div class="card ">
        <div class="card-header">
          <h3 class="card-title">Create Transaction</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
    <form method="POST" action="{{ route('transactions.store')}}">
            {{ csrf_field()}}--}}
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Case Type</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="">
            </div>

          </div>
          <!-- /.card-body -->

         {{-- <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
@endsection--}}