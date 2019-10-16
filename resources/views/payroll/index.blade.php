@extends('layouts.master')

@section('content')

<div class="row ">
        <div class="col-12">
          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Employee's Payroll</h3>
      
      
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Employee Name</th>
                  <th>Employee Role</th>
                 {{-- <th>Gross Salary</th>
                  <th>Deductions</th>
                  <th>Net Salary</th>--}}
                  <th>Action</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                <td>{{++$i}}</td>
                  <td>{{ $user->name }}</td>
                  <td>  
                        @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                       <label class="badge badge-dark badge-flat">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                 {{-- <td>{{ $user->payrolls }}</td>
                  <td>{{ $user->payrolls }}</td>
                  <td>{{ $user->payrolls }}</td>--}}
                  <td>
                      <a class="btn btn-primary btn-flat btn-sm" href="{{ route('payrolls.show',$user->id) }}">Manage salary</a>
                      <a class="btn btn-info btn-flat btn-sm" href="{{ route('payrolls.edit',$user->id) }}">Edit salary</a>

                     {{-- <a class="btn btn-info btn-flat btn-sm" href="{{ route('staff_details.show',$user->id) }}">Profile</a>
                      <a class="btn btn-primary btn-flat btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                       {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat btn-sm']) !!}
                       {!! Form::close() !!}
                  </td>--}}
                </tr>
                @endforeach
              </table>
              {{$users->links()}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
@endsection