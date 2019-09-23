
<div class="row">
    <div class="card-body"> 

    <div class="form-group">
  <label class="col-sm-2 control-label">reference</label>

  <div class="col-sm-10">
  <input type="text" class="form-control" name="reference" id="reference" disabled>
  </div>
</div>


  <input type="hidden"  name="transaction_id" id="transaction_id">



<input type="hidden" name="court_day" id="court_day">
<input type="hidden" name="description" id="description">
<input type="hidden" name="client_id" id="client_id">





<div class="form-group" id="user_id">
  <label class="col-sm-2 control-label">Associates</label><br>
<div class="col-sm-10">
  <select name="user_id" class="form-control" >
      @foreach ($associates as $associate)
  <option value="{{$associate->id}}">{{$associate->name}}</option>                                   
      @endforeach
  </select>
  </div>
</div>

<div class="form-group">
  <label for="inputExperience" class="col-sm-10 control-label">Reason for request</label>
  
  <div class="col-sm-10">
  <textarea class="form-control" id="reason" name="reason"></textarea>
  </div>
  </div>

  <div class="form-group" id="request">
    <label class="col-sm-10 control-label">Select radio button to request file</label>
    <div class="form-check">
          <label class="form-check-label">
            <input type="radio" value="Requested" class="form-check-input"  name="request">Request
          </label>
             </div>
</div>

</div>
</div>
