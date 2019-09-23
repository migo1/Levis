@extends('layouts.master')


@section('content')
    
<section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                      @php
                      $pic_url =  asset('dist/img/user.jpg');
                      if($user->staff_image){
                          $pic_url =  "/storage/cover_images/".$user->staff_image->photo;
                     }

                  @endphp
                    <img class="profile-user-img img-fluid img-circle"
                     src="{{ $pic_url }}"
                         alt="/">
                  </div>
  
                  <h3 class="profile-username text-center">{{ $user->name }}</h3>
  
                <p class="text-muted text-center">{{ $user->getRoleNames() }}</p>

                <button type="button" class="btn btn-sm btn-primary btn-flat mb-2" data-toggle="modal" data-target="#add_image">Add Image</button>
                <button type="button" class="btn btn-sm btn-warning btn-flat mb-2">Edit Image</button>
  
               {{-- <a href="#" class="btn btn-primary btn-block"><b>Add/Change Picture</b></a>--}}

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      @php
                          if ($user->staff_detail) {
                            $mobile_number = $user->staff_detail->mobile_number;
                          }else {
                            $mobile_number = '';
                          }
                      @endphp
                    <b>Mobile Number</b> <a class="float-right">{{ $mobile_number }}</a>
                    </li>
                    <li class="list-group-item">
                        @php
                        if ($user->staff_detail) {
                          $id_number = $user->staff_detail->id_number;
                        }else {
                          $id_number = '';
                        }
                    @endphp
                      <b>National ID</b> <a class="float-right">{{ $id_number }}</a>
                    </li>
                    @php
                    if ($user->staff_detail) {
                      $staff_id = $user->staff_detail->staff_id;
                    }else {
                      $staff_id = '';
                    }
                @endphp
                    <li class="list-group-item">
                      <b>Staff ID</b> <a class="float-right">{{ $staff_id }}</a>
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
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Staff Details</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Add Staff Details</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                    </div>
  
                    <div class="tab-pane" id="settings">

                        
                    <form class="form-horizontal" method="POST" action="{{ route('staff_details.store') }}">
                        {{ csrf_field() }}
                      <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="form-group">
                          <label  class="col-6 control-label">DOB</label>
  
                          <div class="col-sm-10">
                            <input type="text" name="DOB" class="form-control" placeholder="Date Of Birth....">
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-6 control-label">ID Number</label>
  
                          <div class="col-sm-10">
                            <input type="number" name="id_number" class="form-control"  placeholder="National ID Number....">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-6 control-label">Staff ID</label>
  
                          <div class="col-sm-10">
                            <input type="text" name="staff_id" class="form-control" placeholder="Staff ID">
                          </div>
                        </div>
                        <div class="form-group">
                          <label  class="col-sm-6 control-label">Mobile No.</label>
                          <div class="col-sm-10">
                            <input type="telephone" name="mobile_number" class="form-control" placeholder="Mobile Number....">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-6 control-label">NHIF No.</label>
  
                          <div class="col-sm-10">
                            <input type="text" name="NHIF_number" class="form-control" placeholder="NHIF NUMBER...">
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label">NSSF No.</label>
    
                            <div class="col-sm-10">
                              <input type="text" name="NSSF_number" class="form-control" placeholder="NSFF NUMBER...">
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-6 control-label">Empl date</label>
      
                              <div class="col-sm-10">
                                <input type="text" name="employment_date" class="form-control" placeholder="Employment Date...">
                              </div>
                            </div>

                            <div class="form-group">
                                <label>Gender</label><br>
                                <label>
                                  <input type="radio" name="gender" value="male">
                                  Male
                                </label>
                                <label>
                                  <input type="radio" name="gender" value="female">
                                  Female
                                </label>
                              </div>

                                <div class="form-group">
                                    <label>Active</label><br>
                                    <label>
                                      <input type="radio" name="status" value="yes">
                                      Yes
                                    </label>
                                    <label>
                                      <input type="radio" name="status" value="no">
                                      No
                                    </label>
                                  </div>
                                  <input type="hidden" name="photo">

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
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
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->


          <!-- Modal add_image-->
<div class="modal fade" id="add_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('staff_images.store') }}" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        @csrf
        @include('staff_detail.add_image')
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection