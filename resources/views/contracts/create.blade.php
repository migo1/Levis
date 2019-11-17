@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create Smart Contract</h2>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-sm-12">
    {{--<h1>Salary Details <a href="{{ route('payrolls.index') }}" class="btn btn-success btn-flat float-right">Back</a></h1>--}}
    </div>
  </div>

  <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        
           {{-- @foreach ($files as $file )--}}
          <div class="card-body">
            <div class="form-group">
         
              <label for="exampleInputEmail1">..</label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="" disabled>
            </div>
            <div class="form-group">
           
              <label for="exampleInputPassword1">..</label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="" disabled>
            </div>
            <div class="form-group">
                    <label for="exampleInputPassword1">..</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" value="" disabled>
                  </div>
          </div>
         {{-- @endforeach--}}
          <!-- /.card-body -->

      </div>

        <form method="POST" action="{{ route('payrolls.store') }}">
            @csrf

  <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Employee Details</h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Empoyee Name:</label>
            <input type="hidden" class="form-control" value="" name="user_id">
            <input type="text" class="form-control" value="" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Basic Salary:</label>
              <input type="number" class="form-control" name="basic">
            </div>
          </div>
          <!-- /.card-body -->
        <input type="hidden" name="gross_pay" >
<input type="hidden" name="deductions"  >
<input type="hidden" name="net_pay" >
      </div>
  <div class="row">

<div class="col-md-6">

  <div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Allowances and tax relief</h3>
    </div>
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">House/Rent Allowance</label>
          <input type="number" class="form-control" name="house_allowance">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Medical Allowance</label>
                <input type="number" class="form-control" name="medical_allowance">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Other Allowance</label>
                <input type="number" class="form-control" name="other_allowance">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Tax Relief</label>
                <input type="number" class="form-control" name="relief">
        </div>
      </div>

  </div>
</div>


<div class="col-md-6">

        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Deductions</h3>
          </div>
            <div class="card-body">
              {{--  @foreach ($user->payrolls as $pay)--}}
                <div class="form-group">
                        <label for="exampleInputEmail1">PAYE</label>
                <input type="number" class="form-control" name="PAYE" value="" disabled>
                      </div> 
               {{-- @endforeach--}}
              
              <div class="form-group">
                      <label for="exampleInputEmail1">NSSF</label>
                      <input type="number" class="form-control" name="NSSF" >
              </div>
              <div class="form-group">
                      <label for="exampleInputEmail1">NHIF</label>
                      <input type="number" class="form-control" name="NHIF" >
              </div>
            </div>
      
        </div>
        <button type="submit" class="btn btn-success btn-flat float-right btn-lg">Submit</button>
      </div>
</div>
</form>
@endsection
