<div class="row">


    <input type="hidden" name="user_id">
  <div class="card-body">
        <div class="form-group">
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
        <input type="text" class="form-control" name="from" placeholder="start date...">
      </div>
    </div>
    <div class="form-group">
            <label  class="col-sm-2 control-label">To</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="to" placeholder="return date">
            </div>
          </div>
          <input type="hidden" name="diff">
          <div class="form-group">
                <label class="col-sm-4 control-label">Brief explanation</label>
                
                <div class="col-sm-10">
                  <textarea class="form-control" name="reason" placeholder="brief explanation..."></textarea>
                </div>
                </div>
                <input type="hidden" name="response" value="Pending">
                <input type="hidden" name="reply">
              
  </div>
  <!-- /.card-body -->

  <!-- /.card-footer -->


</div>