
<div class="row">
<div class="card-body">
<div class="form-group">
        <label class="col-sm-2 control-label">Client</label>
        <div class="col-sm-10">
        <select name="client_id" class="form-control">
                @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->name}}</option>                                   
                @endforeach
            </select>
        </div>
</div>

    <div class="form-group">
            <label class="col-sm-2 control-label">Transactions</label>
            <div class="col-sm-10">
        <select name="transaction_id" class="form-control">
                @foreach ($transactions as $transaction)
            <option value="{{$transaction->id}}">{{$transaction->name}}</option>                                   
                @endforeach
            </select>
        </div>
    </div>
                  
      <div class="form-group">
        <label  class="col-sm-2 control-labell">Date</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="court_day">
    </div>
      </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Description</label>

    <div class="col-sm-10">
      <textarea class="form-control"  name="description" placeholder="Description"></textarea>
    </div>
  </div>
  <input type="hidden" name="reference">
</div>
</div>