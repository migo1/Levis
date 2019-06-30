@extends('layouts.master')

@section('content')

<div class="container">
<form method="POST" action="{{ route('files.store')}}">
        {{ csrf_field() }}
        <label class=" control-label ml-0 mb-0">Client</label><br>
    <div class="form-group">
            <select name="client_id" class="form-control">
                    @foreach ($client as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>                                   
                    @endforeach
                </select>
    </div>
    <label class=" control-label ml-0 mb-0">Transactions</label><br>
        <div class="form-group">
            <select name="transaction_id" class="form-control">
                    @foreach ($transactions as $transaction)
                <option value="{{$transaction->id}}">{{$transaction->name}}</option>                                   
                    @endforeach
                </select>
        </div>
                      
          <div class="form-group">
            <label for="exampleInputPassword1" class="control-label">Date</label>
            <input type="text" class="form-control" name="court_day"  >
          </div>
      <div class="form-group">
        <label for="inputExperience" class="control-label">Description</label>

        <div class="">
          <textarea class="form-control" id="inputExperience" name="description" placeholder="Description"></textarea>
        </div>
      </div>
      <input type="hidden" name="reference">
      <div class="form-group">
        <div class="col-sm-offset-2">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
</div>
@endsection