@extends('layouts.master')

@section('content')


<section class="content">

      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$users}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$clients}}</h3>
  
                  <p>Clients</p>
                </div>
                <div class="icon">
                  <i class="fas fa-briefcase"></i>
                </div>
                <a href="{{ route('clients.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$files}}</h3>
  
                  <p>Files</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-alt"></i>
                </div>
                <a href="{{ route('files.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3>{{$transactions}}</h3>
  
                  <p>Case Types</p>
                </div>
                <div class="icon">
                  <i class="fas fa-gavel"></i>
                </div>
                <a href="{{ route('transactions.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

        </div>

</section>






<section class="content">

    <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Today Court Case(s)</h4>
              </div>
              <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <tr>
                      <th>No</th>
          {{-- <th>Client's Code</th>--}}
                      <th>Client's Name</th>
                      <th>Transaction</th>
                   <th>Reference</th>
                    </tr>
                    @foreach ($todays_case as $file)
                    <tr>
                      <td>{{++$i}}</td>
                 {{--  <td>{{ $file->client->uuid}}</td>--}}
                      <td>{{ $file->client->name }}</td>
                      <td>{{ $file->transaction->name }}</td>
                  <td>{{ $file->reference}}</td>
                      
                    </tr>
                    @endforeach
                  </table>
                {{$todays_case->links()}}
                </div>

              </div>

            </div>
       


<div class="col-md-6">
<div class="card card-shadow mb-4">
  <div class="card-body p-0">
     <div>
          {!! $calendar->calendar() !!}
          {!! $calendar->script() !!}
     </div>
  </div>
</div>
</div>
  </div>


</section>

@endsection
