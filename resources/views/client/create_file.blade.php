
<div class="row">
  <div class="card-body">
        <div class="form-group">
<label class="col-sm-2 control-label">Transactions</label><br>

<div class="col-sm-10">
    <select name="transaction_id" class="form-control">
            @foreach ($transactions as $transaction)
        <option value="{{$transaction->id}}">{{$transaction->name}}</option>                                   
            @endforeach
        </select>
</div>
</div>
              
  <div class="form-group">
    <label class="col-sm-2 control-label">Date</label>

    <div class="col-sm-10">
    <input type="text" class="form-control" name="court_day">
    </div>
  </div>
<div class="form-group">
<label for="inputExperience" class="col-sm-2 control-label">Description</label>

<div class="col-sm-10">
  <textarea class="form-control" id="inputExperience" name="description" placeholder="Description"></textarea>
</div>
</div>
<input type="hidden" name="client_id" value="{{$client->id}}">
<input type="hidden" name="reference">
</div>
</div>