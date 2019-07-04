<div class="row">
    <input type="hidden" name="user_id" id="user_id">
  <div class="card-body">
        <div class="form-group" id="leave_id">
                <label class="col-sm-4 control-label">Leave Type</label><br>
                
                <div class="col-sm-10">
                    <select name="leave_id" class="form-control">
                            @foreach ($leaves as $leave)
                        <option value="{{$leave->id}}">{{$leave->leave_type}}</option>                                   
                            @endforeach
                        </select>
                </div>
                </div>
    <div class="form-group">
      <label  class="col-sm-2 control-label">From</label>

      <div class="col-sm-10">
        <input type="text" class="form-control" name="from" id="from">
      </div>
    </div>
    <div class="form-group">
            <label  class="col-sm-2 control-label">To</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="to" id="to">
            </div>
          </div>
          <input type="hidden" name="diff" id="diff">
          <div class="form-group">
                <label class="col-sm-4 control-label">Brief explanation</label>
                
                <div class="col-sm-10">
                  <textarea class="form-control" name="reason" id="reason"></textarea>
                </div>
                </div>
                <input type="hidden" name="response" id="response">
                <input type="hidden" name="reply" id="reply">
              
  </div>
  <!-- /.card-body -->

  <!-- /.card-footer -->


</div>