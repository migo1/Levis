@extends('layouts.master')

@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
    <h1>Salary Details <a href="{{ route('payrolls.index') }}" class="btn btn-success btn-flat float-right">Back</a></h1>
    </div>
  </div>

  <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Salary Details</h3>
        </div>
        
          @foreach ($user->payrolls as $payroll )
          <div class="card-body">
            <div class="form-group">
         
              <label for="exampleInputEmail1">Gross Pay:</label>
              <input type="text" class="form-control" value="{{ $payroll->gross_pay }}" disabled>
            </div>
            <div class="form-group">
           
              <label for="exampleInputPassword1">Total Deductions:</label>
            <input type="number" class="form-control" value="{{ $payroll->deductions }}" disabled>
            </div>
            <div class="form-group">
                    <label for="exampleInputPassword1">Net Pay:</label>
                    <input type="number" class="form-control" value="{{ $payroll->net_pay }}" disabled>
                  </div>
          </div>
          <!-- /.card-body -->
@endforeach
      </div>

      <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Manage Salary Details</h1>
            </div>
          </div>
          @foreach ($user->payrolls as $payroll )
        <form method="POST" action="{{ route('payrolls.update', $payroll->id) }}">
            @csrf
            @method('PUT')

  <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Employee Details</h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Empoyee Name:</label>
            <input type="hidden" class="form-control" value="{{ $user->id }}" name="user_id">
            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Basic Salary:</label>
              <input type="number" class="form-control" name="basic" value="{{ $payroll->basic }}">
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
          <input type="number" class="form-control" name="house_allowance" value="{{ $payroll->house_allowance }}">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Medical Allowance</label>
                <input type="number" class="form-control" name="medical_allowance" value="{{ $payroll->medical_allowance }}">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Other Allowance</label>
                <input type="number" class="form-control" name="other_allowance" value="{{ $payroll->other_allowance }}">
        </div>
        <div class="form-group">
                <label for="exampleInputEmail1">Tax Relief</label>
                <input type="number" class="form-control" name="relief" value="{{ $payroll->relief }}">
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
                <div class="form-group">
                        <label for="exampleInputEmail1">PAYE</label>
                <input type="number" class="form-control" value="{{ $payroll->PAYE }}" disabled>
                      </div> 
              
              <div class="form-group">
                      <label for="exampleInputEmail1">NSSF</label>
              <input type="number" class="form-control" name="NSSF" value="{{ $payroll->NSSF }}">
              </div>
              <div class="form-group">
                      <label for="exampleInputEmail1">NHIF</label>
                      <input type="number" class="form-control" name="NHIF" value="{{ $payroll->NHIF }}">
              </div>
            </div>
      
        </div>
        

        <button type="submit" class="btn btn-primary btn-flat float-right btn-lg">Update</button>
      </div>
</div>
</form>
@endforeach
@endsection