<div class="row">
  <div class="card-body">
    <input type="hidden" name="user_id" id="user_id">
    <input type="hidden" name="leave_id" id="leave_id">
    <input type="hidden" name="from" id="from">
    <input type="hidden" name="to" id="to">
    <input type="hidden" name="diff" id="diff">
    <input type="hidden" name="reason" id="reason">

          <div class="form-group">
                <label class="col-sm-10 control-label">Reply To Leave Request</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="reply" id="reply"></textarea>
                </div>
                </div>               

                <div class="form-group" id="response">
                    <label class="col-sm-10 control-label">Respond To Leave Request</label>
                    <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" value="Approved" class="form-check-input"  name="response">Approve
                          </label>
                             </div>
                             <div class="form-check" >
                                <label class="form-check-label">
                                  <input type="radio" value="Denied" class="form-check-input" name="response">Deny
                                </label>
                              </div>
                </div>
              
  </div>
  <!-- /.card-body -->

  <!-- /.card-footer -->


</div>