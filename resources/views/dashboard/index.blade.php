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

<section>  
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
         @endforeach
      </ul>
    </div>
  @endif

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif

  @if ($message = Session::get('warning'))
  <div class="alert alert-warning">
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="row">
 
    <div class="card ml-2">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-bed "></i>
           Leaves List
          </h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <tr>
              <th>Leave Type</th>
              <th>From</th>
              <th>To</th>
           <th>Remainder</th>
              <th>Response</th>
              <th>Action</th>
            </tr>
            @foreach ($leave_req as $leave_requests)
            <tr>         
            <td>{{ $leave_requests->leave->leave_type}}</td>
            <td>{{ $leave_requests->from}}</td>
            <td>{{ $leave_requests->to}}</td>
          <td>{{ $leave_requests->remainder}}</td>
            @if($leave_requests->response == 'Approved')
            <td><span class="label label-success"><strong>{{$leave_requests->response}}</strong></span></td>
            @elseif($leave_requests->response == 'Pending')
            <td><span class="label label-warning"><strong>{{$leave_requests->response}}</strong></span></td>
            @elseif($leave_requests->response == 'Denied')
            <td><span class="label label-danger"><strong>{{$leave_requests->response}}</strong></span></td>
            @endif

            @if($leave_requests->response == 'Approved')
            @elseif($leave_requests->response == 'Denied')
                @can('view-file')
                <td>
                  <button class="btn btn-sm btn-flat btn-primary"
                data-mylrid="{{ $leave_requests->id }}" data-myuid="{{ $leave_requests->user_id }}"
                data-mylid="{{ $leave_requests->leave_id }}" data-myfrom="{{ $leave_requests->from }}" data-myto="{{ $leave_requests->to }}"
                data-mydiff="{{ $leave_requests->days_diff }}" data-myreason="{{ $leave_requests->reason }}"
                data-myresponse="{{ $leave_requests->response }}" data-myreply="{{ $leave_requests->response }}"
                  data-toggle="modal" data-target="#edit_leave_request"
                  >
                    Edit
                  </button>
                  <button class="btn btn-sm btn-flat btn-danger"
                  data-mylrid="{{ $leave_requests->id }}"
                  data-toggle="modal" data-target="#delete_leave_request"
                  >
                    Delete
                  </button>
                </td>
                @endcan
                @else
                <td>
                  <button class="btn btn-sm btn-flat btn-primary"
                data-mylrid="{{ $leave_requests->id }}" data-myuid="{{ $leave_requests->user_id }}"
                data-mylid="{{ $leave_requests->leave_id }}" data-myfrom="{{ $leave_requests->from }}" data-myto="{{ $leave_requests->to }}"
                data-mydiff="{{ $leave_requests->days_diff }}" data-myreason="{{ $leave_requests->reason }}"
                data-myresponse="{{ $leave_requests->response }}" data-myreply="{{ $leave_requests->response }}"
                  data-toggle="modal" data-target="#edit_leave_request"
                  >
                    Edit
                  </button>
                  <button class="btn btn-sm btn-flat btn-danger"
                  data-mylrid="{{ $leave_requests->id }}"
                  data-toggle="modal" data-target="#delete_leave_request"
                  >
                    Delete
                  </button>
                </td>
            @endif

            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <button type="button" class="btn btn-primary btn-sm btn-flat float-right"
          data-toggle="modal" data-target="#leave_request">
          <i class="fas fa-bed mr-2"></i>Request Leave</button>
        </div>
      </div>
      <!-- /.card -->
    </div>
    </section>






    <!-- Modal leave_request-->
<div class="modal fade" id="leave_request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('requests.store')}}">
        @csrf
      <div class="modal-body">
        
        @include('dashboard.leave_request')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Request</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal edit_leave_request-->
<div class="modal fade" id="edit_leave_request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Leave Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('requests.update','test')}}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
      <input type="hidden" name="leave_request_id" id="leave_request_id" value="">
        
        @include('dashboard.edit_leave_request')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Save Changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal delete_leave_request-->
<div class="modal fade" id="delete_leave_request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Leave Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('requests.destroy','test')}}">
        {{method_field('delete')}}
        @csrf
      <div class="modal-body">
      <input type="hidden" name="leave_request_id" id="leave_request_id" value="">
        
        <p class="text-center">
          Are you sure you want to delete this request
        </p>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">No, Cancel</button>
        <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Delete</button>
      </div>
    </form>
    </div>
  </div>
</div>


<script>
  $('#edit_leave_request').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var leave_request_id = button.data('mylrid')
  var user_id = button.data('myuid')
  var leave_id = button.data('mylid')
  var from = button.data('myfrom')
  var to = button.data('myto')
  var days_diff = button.data('mydiff')
  var reason = button.data('myreason')
  var response = button.data('myresponse')
  var reply = button.data('myreply')

  var modal = $(this)
  modal.find('.modal-body #leave_request_id').val(leave_request_id)
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #leave_id').val(leave_id)
  modal.find('.modal-body #from').val(from)
  modal.find('.modal-body #to').val(to)
  modal.find('.modal-body #days_diff').val(days_diff)
  modal.find('.modal-body #reason').val(reason)
  modal.find('.modal-body #response').val(response)
  modal.find('.modal-body #reply').val(reply)
})
  </script>

<script>
  $('#delete_leave_request').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var leave_request_id = button.data('mylrid')

  var modal = $(this)
  modal.find('.modal-body #leave_request_id').val(leave_request_id)

})
  </script>
@endsection
