@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Today's Court Case</h3>
      
      
            </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>Client's Code</th>
            <th>Client's Name</th>
            <th>Transaction</th>
            <th>Reference</th>
          </tr>
          @foreach ($todays_case as $file)
          <tr>
            <td>{{++$i}}</td>
            <td>{{ $file->client->uuid}}</td>
            <td>{{ $file->client->name }}</td>
            <td>{{ $file->transaction->name }}</td>
            <td>{{ $file->reference}}</td>
            <td>
          </tr>
          @endforeach
        </table>
      {{$todays_case->links()}}
      </div>
    
    
    </div>
    <!-- /.card -->
    </div>
    </div><!-- /.row -->
</div>
@endsection
