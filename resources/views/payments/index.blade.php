@extends('layouts.master')

@section('content')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Manage {{ $user->name }}'s Payments</h1>
    </div>
  </div>


<div class="row">
    <div class="col-md-4">

 

  <div class="card card">
        <div class="card-header">
          <h3 class="card-title">Payslip</h3>
        </div>
       <h5 class="mt-2 mb-0"><label class="ml-4">Description</label>  <label class="float-right mr-4">Ammount</label></h5> 
       <hr class="mt-0">
            @foreach ($user->payrolls as $payroll )
          <div class="card-body">
            <div class="form-group ">
            <p>Basic  <em class="float-right mr-4 ">{{ number_format($payroll->basic, 2, '.', ',') }}</em></p>
            <p>House Allowance <em class="float-right mr-4 ">{{ number_format($payroll->house_allowance, 2, '.', ',') }}</em> </p>
            <p>Medical Allowance <em class="float-right mr-4 ">{{ number_format($payroll->medical_allowance, 2, '.', ',') }}</em></p>
            <p>Other Allowance <em class="float-right mr-4 ">{{ number_format($payroll->other_allowance, 2, '.', ',') }}</em></p>
            <hr class="mt-0 ">
            <p><strong>GROSS PAY</strong> <strong class="float-right mr-4 ">{{ number_format($payroll->gross_pay, 2, '.', ',') }}</strong></p>
            <hr >
            </div>
            <div class="form-group">
                <p> PAYE <em class="float-right mr-4 ">{{ number_format($payroll->PAYE, 2, '.', ',') }}</em> </p>
                <P> Tax-relief <em class="float-right mr-4 ">-{{ number_format($payroll->relief, 2, '.', ',') }}</em>  </P>
                <P> NSSF <em class="float-right mr-4 ">{{ number_format($payroll->NSSF, 2, '.', ',') }}</em> </P>
                <p> NHIF <em class="float-right mr-4 ">{{ number_format($payroll->NHIF, 2, '.', ',') }}</em>  </p>
                <hr class="mt-0 ">
                <p><strong>TOTAL DEDUCTIONS</strong> <strong class="float-right mr-4 ">{{ number_format($payroll->deductions, 2, '.', ',') }}</strong></p>
                <hr >
            </div>
            <div class="form-group">
                    <p> Taxable Income <em class="float-right mr-4 ">{{ number_format($payroll->gross_pay, 2, '.', ',') }}</em> </p>
                    <P> Tax Charged <em class="float-right mr-4 ">{{ number_format($payroll->PAYE, 2, '.', ',') }}</em>  </P>
                    <P> Relief of Month(-) <em class="float-right mr-4 ">{{ number_format($payroll->relief, 2, '.', ',') }}</em>  </P>
                    <hr class="mt-0 ">
                    <p><strong>NET PAY</strong> <strong class="float-right mr-4 ">{{ number_format($payroll->net_pay, 2, '.', ',') }}</strong></p>
                    <hr >
                  </div>
          </div>
          @endforeach
          <!-- /.card-body -->

      </div>

    </div>


    <div class="col-md-8">
        <div class="card card">
            <div class="card-header">
              <h3 class="card-title">Payments <button class="btn btn-success btn-sm btn-flat float-right" data-toggle="modal" data-target="#make_payment">Make Payment</button></h3>
            </div>
                    <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                              <tr>
                              {{--  <th>No</th>--}}
                        
                                <th>Status</th>
                                <th>Date</th>
                                <th>Last Paid</th>
                                <th>Net Pay</th>
                                <th>Modify</th>
                              </tr>
                         @foreach ($user->payments as $payment)
                              <tr>
                              <td>{{ $payment->status }}</td>
                              <td>{{ $payment->created_at->toDateString() }}</td>   
                              <td>{{ $payment->created_at->diffForHumans() }}</td>
                              <td>{{ number_format($payment->payroll->net_pay, 2, '.', ',') }}</td>             

                                <td>
                                  <button class="btn btn-primary btn-sm btn-flat"
                                data-mypay="{{ $payment->id }}" data-myuid="{{ $payment->user->id }}" 
                                data-myroll="{{ $payment->payroll->id }}"  data-mystatus="{{ $payment->status }}"
                                  data-toggle="modal" data-target="#edit_payment">Edit</button>

                                  <button class="btn btn-danger btn-sm btn-flat"
                                  data-mypay="{{ $payment->id }}"
                                  data-toggle="modal" data-target="#delete_payment"
                                  >Delete</button>
                                </td>
                              </tr>
                              @endforeach 
                            </table>
                            {{--        {{$holidays->links()}}--}}
                          </div>

          </div>
    </div>
</div>

    <!-- Modal make_payment-->
    <div class="modal fade" id="make_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('payrolls.payments.store','test')}}">
                <div class="modal-body">
                  @csrf
                  @include('payments.create')
                </div>
               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">cancel</button>
                  <button type="submit" class="btn btn-primary btn-sm btn-flat">Submit</button>
                </div>
              </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="edit_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="form-horizontal" method="POST" action="{{ route('payrolls.payments.update',['test', 'up'])}}">
                    {{method_field('patch')}}
                    @csrf
                  <div class="modal-body">

                      <input type="hidden" name="user_id" id="user_id" >

                        <input type="hidden" name="payment_id" id="payment_id" value="">
                    
                    @include('payments.edit')
                  </div>
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-flat">Update</button>
                  </div>
                </form>
                </div>
              </div>
            </div>


              <!-- Modal delete-->
<div class="modal fade" id="delete_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('payrolls.payments.destroy',['test', 'up'])}}">
          {{method_field('delete')}}
          @csrf
        <div class="modal-body mt-0 mb-0">
          <p class="text-center">
            Are you sure you want to delete this?
          </p>
        <input type="hidden" name="payment_id" id="payment_id" value="">
        
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-sm btn-flat" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger btn-sm btn-flat">Yes, Delete</button>
        </div>
      </form>
      </div>
    </div>
  </div>



            <script>
                $('#edit_payment').on('show.bs.modal', function (event) {
              
                var button = $(event.relatedTarget) 
                var payment_id = button.data('mypay')
                var user_id = button.data('myuid')
                var payroll_id = button.data('myroll')
                var status = button.data('mystatus')


                var modal = $(this)
                modal.find('.modal-body #payment_id').val(payment_id)
                modal.find('.modal-body #user_id').val(user_id)
                modal.find('.modal-body #payroll_id').val(payroll_id)
                modal.find('.modal-body #status').val(status)

              
              })
                </script>

<script>
    $('#delete_payment').on('show.bs.modal', function (event) {
  
    var button = $(event.relatedTarget) 
    var payment_id = button.data('mypay')

    var modal = $(this)
    modal.find('.modal-body #payment_id').val(payment_id)

  })
    </script>
@endsection