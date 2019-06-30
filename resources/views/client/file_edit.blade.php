
<div class="row">
    <div class="card-body">

        <div class="form-group">
            <label class="col-sm-2 control-label">reference</label>
        
            <div class="col-sm-10">
            <input type="text" class="form-control" name="reference" id="reference" disabled>
            </div>
          </div>

          <div class="form-group" id="transaction_id">
  <label class="col-sm-2 control-label">Transactions</label><br>
  
  <div class="col-sm-10">
      <select name="transaction_id" class="form-control" >
              @foreach ($transactions as $transaction)
          <option value="{{$transaction->id}}">{{$transaction->name}}</option>                                   
              @endforeach
          </select>
  </div>
  </div>
                
    <div class="form-group">
      <label class="col-sm-2 control-label">Date</label>
  
      <div class="col-sm-10">
      <input type="text" class="form-control" name="court_day" id="court_day">
      </div>
    </div>
  <div class="form-group">
  <label for="inputExperience" class="col-sm-2 control-label">Description</label>
  
  <div class="col-sm-10">
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  </div>
  <input type="hidden" name="client_id" id="client_id">

  </div>
  </div>