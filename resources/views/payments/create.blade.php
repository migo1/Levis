<div class="row">
        <div class="card-body">
        <input type="hidden" name="user_id" value="{{ $user->id }}" >
                 <div class="form-group" >
                        <strong>Payment:</strong>
                        <div class="form-check" >
                          <label class="form-check-label">
                            <input type="checkbox" value="paid" class="form-check-input" name="status">Confirm Payment
                          </label>
                        </div> 
                    </div>   
                    @foreach ( $user->payrolls as $payroll)
                    <input type="hidden" name="payroll_id" value="{{ $payroll->id }}">
                    @endforeach
        </div>

  </div>