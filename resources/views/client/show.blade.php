@extends('layouts.master')


@section('content')
    
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
  
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/img/owner.png"
                       alt="User profile picture">
                </div>
  
                <h3 class="profile-username text-center">{{$client->name}}</h3>
  
            <p class="text-muted text-center">{{$client->email}}</p>
  
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <b>Client since:</b> <a class="float-right">{{$client->created_at->diffForHumans()}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact:</b> <a class="float-right">{{$client->mobile_no}}</a>
                  </li>
                  <li class="list-group-item">
                      <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>
                      <p class="text-muted">Nairobi, Kenya</p>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#create_file" data-toggle="tab">Create File</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">{{ $client->name}}'s Files<a class="btn btn-success btn-flat btn-sm m-0 float-right" href="{{ route('clients.create')}}">Add New Client</a></h3>
      
      
            </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
          <tr>
            <th>Date</th>
            <th>Description</th>
            <th>reference</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
          @foreach ($client->files as $file)
          <tr>
            <td>{{ $file->court_day }}</td>
          <td>{{ $file->description}}</td>
          <td>{{ $file->reference}}</td>
          <td>{{ $file->transaction->name}}</td>

            <td>
                <a class="btn btn-primary btn-flat btn-sm" href="#">Edit</a>
                 {!! Form::open(['method' => 'DELETE','style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                 {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </table>
       {{-- {{$files->links()}}--}}
      </div>
    
    
    </div>
    <!-- /.card -->
    </div>
    </div><!-- /.row -->
                  </div>
                  <!-- /.tab-pane -->
  
                  <div class="tab-pane" id="create_file">
                  <form method="POST" action="{{ route('files.store')}}">
                        {{ csrf_field() }}
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
                    <input type="hidden" name="client_id" value="{{$client->id}}">
                      <input type="hidden" name="reference">
                      <div class="form-group">
                        <div class="col-sm-offset-2">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

@endsection