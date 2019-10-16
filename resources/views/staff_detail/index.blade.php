@extends('layouts.master')

@section('content')

<div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Staff </h3>
      
      
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Action</th>
                </tr>
                @foreach ($data as $key => $user)
                <tr>
                <td>{{++$i}}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>  
                        @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                       <label class="badge badge-dark badge-flat">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                  <td>
                      <a class="btn btn-info btn-flat btn-sm" href="{{ route('staff_details.show',$user->id) }}">Profile</a>
                      <a class="btn btn-primary btn-flat btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                       {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                       {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
@endsection