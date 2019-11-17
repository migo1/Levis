@extends('layouts.master')

@section('content')


<div class="row ">
    <div class="col-12">
      <div class="card mt-2">
        <div class="card-header">
          <h3 class="card-title">Leave Types Table
                <button type="button" class="btn btn-success btn-flat btn-sm m-0 float-right" data-toggle="modal" data-target="#create_leave">
                        Add Leave Type
                      </button>
                     </h3>
  
  
        </div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
      <tr>
        <th>No</th>

        <th>Leave Type</th>

      </tr>
      @foreach ($leaves as $leave)
      <tr>
        <td>{{++$i}}</td>

        <td>{{ $leave->leave_type }}</td>

        <td>


        <button 
        class="btn btn-primary btn-flat btn-sm"
        data-mylid="{{$leave->id}}" data-myleave="{{$leave->leave_type}}"
        data-toggle="modal" data-target="#edit_leave">    
            Edit
        </button>

        <button 
        class="btn btn-danger btn-flat btn-sm"
        data-mylid="{{$leave->id}}"
        data-toggle="modal" data-target="#delete_leave">
        Delete
        </button>

        </td>
      </tr>
      @endforeach
    </table>
    {{$leaves->links()}}
  </div>


</div>
<!-- /.card -->
</div>
</div><!-- /.row -->

<div class="row">
    <div class="col-12">
        <div class="card mt-2">
          <div class="card-header">
            <h3 class="card-title">Leave Request Table
                {{--  <button type="button" class="btn btn-success btn-flat btn-sm m-0 float-right" data-toggle="modal" data-target="#create_leave">
                          Add Leave Type
                        </button>--}}
                       </h3>
    
    
          </div>
  <div class="card-body table-responsive p-0">
      <table class="table table-hover">
        <tr>
          <th>No</th>
          <th>Employee Name</th>
          <th>Leave Type</th>
          <th>Leave Date</th>
          <th>Return Date</th>
          <th>Remaining days</th>
          <th>Reason</th>
          <th>Respond</th>
          <th>Reply</th>
          <th>Action</th>
        </tr>
        @foreach ($leave_req as $leave_requests)
        <tr>
          <td>{{ $loop->index+1}}</td>
          <td>{{ $leave_requests->user->name }}</td>
          <td>{{ $leave_requests->leave->leave_type }}</td>
          <td>{{ $leave_requests->from }}</td>
          <td>{{ $leave_requests->to}}</td>
          <td>{{ $leave_requests->remainder }}</td>
          <td>{{ $leave_requests->reason}}</td>
          @if($leave_requests->response == 'Approved')
          <td><span class="label label-success"><strong>{{$leave_requests->response}}</strong></span></td>
          @elseif($leave_requests->response == 'Pending')
          <td><span class="label label-warning"><strong>{{$leave_requests->response}}</strong></span></td>
          @elseif($leave_requests->response == 'Denied')
          <td><span class="label label-danger"><strong>{{$leave_requests->response}}</strong></span></td>
          @endif
          <td>{{ $leave_requests->reply }}</td>
          <td> 

          <button 
          class="btn btn-dark btn-flat btn-sm"
          data-mylrid="{{ $leave_requests->id }}" data-myuid="{{ $leave_requests->user_id }}"
          data-mylid="{{ $leave_requests->leave_id }}" data-myfrom="{{ $leave_requests->from }}" data-myto="{{ $leave_requests->to }}"
          data-mydiff="{{ $leave_requests->days_diff }}" data-myreason="{{ $leave_requests->reason }}"
          data-myresponse="{{ $leave_requests->response }}" data-myreply="{{ $leave_requests->reply }}"
          data-toggle="modal" data-target="#respond_to_leave_request">    
              Respond
          </button>
  
        {{--  <button 
          class="btn btn-danger btn-flat btn-sm"
          
          data-toggle="modal" data-target="#">
          Delete
          </button>--}}
                
          </td>
        </tr>
        @endforeach
      </table>
      {{$leaves->links()}}
    </div>
  
  
  </div>
  <!-- /.card -->
  </div>
</div>

<!-- Modal create_leave -->
<div class="modal fade" id="create_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Leave Type</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('leaves.store')}}">
              @csrf
            <div class="modal-body">
              
              @include('leave.create')
            </div>
           
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm btn-flat">Create</button>
            </div>
          </form>
          </div>
        </div>
      </div>

<!-- Modal edit_leave -->
      <div class="modal fade" id="edit_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Leave Type</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('leaves.update','test')}}">
                  {{method_field('patch')}}
                  @csrf
                <div class="modal-body">
                <input type="hidden" name="leave_id" id="leave_id" value="">
                  @include('leave.edit')
                </div>
               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm btn-flat">Save Changes</button>
                </div>
              </form>
              </div>
            </div>
          </div>

          <!-- Modal delete_leave -->
      <div class="modal fade" id="delete_leave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="form-horizontal" method="POST" action="{{ route('leaves.destroy','test')}}">
                {{method_field('delete')}}
                @csrf
              <div class="modal-body">
              
               <p class="text-center">
                Are you sure you want to delete this leave type
               </p>

               <input type="hidden" name="leave_id" id="leave_id" value="">
              </div>
             
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">No, Cancel</button>
                <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Delete</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        <!-- Modal respond_to_leave_request-->
<div class="modal fade" id="respond_to_leave_request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Response To Leave Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="{{ route('requests.update','test')}}">
        {{method_field('patch')}}
        @csrf
      <div class="modal-body">
      <input type="hidden" name="leave_request_id" id="leave_request_id" value="">
        
        @include('leave.respond')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Respond</button>
      </div>
    </form>
    </div>
  </div>
</div>
    


          <script>
                $('#edit_leave').on('show.bs.modal', function (event) {
              
                var button = $(event.relatedTarget) 
                var leave_id = button.data('mylid')
                var leave_type = button.data('myleave')

               
                var modal = $(this)
                modal.find('.modal-body #leave_id').val(leave_id)
                modal.find('.modal-body #leave_type').val(leave_type)

              })
                </script>

<script>
    $('#delete_leave').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget) 
    var leave_id = button.data('mylid')

   
    var modal = $(this)
    modal.find('.modal-body #leave_id').val(leave_id)

  })
    </script>

<script>
  $('#respond_to_leave_request').on('show.bs.modal', function (event) {

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
@endsection