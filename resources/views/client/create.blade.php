@extends('layouts.master')

@section('content')
    
<a href="{{ route('clients.index')}}" class="btn btn-success mt-2 mb-2">back</a>


<section class="content">
        <div class="container-fluid">

    
                <!-- Horizontal Form -->
                <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Add New Client</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('clients.store')}}">

                            {{ csrf_field() }}
            
                            <input type="hidden" name="uuid">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
          
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="name">
                              </div>
                            </div>
                            <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Telephone</label>
                    
                                        <div class="col-sm-10">
                                          <input type="tel" class="form-control" name="mobile_no" id="inputEmail3" placeholder="Email">
                                        </div>
                                      </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-info">Add</button>
                           {{-- <button type="submit" class="btn btn-default float-right">Cancel</button>--}}
                          </div>
                          <!-- /.card-footer -->
                        </form>
                      </div>
    
        
        </div>
    </section>

@endsection