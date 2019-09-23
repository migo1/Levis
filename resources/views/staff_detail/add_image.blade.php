<div class="row">

    <div class="card-body">

        <div class="form-group">
            <label class="col-sm-2 control-label">Add Image</label>
        
            <div class="col-sm-10">
                <input type="file" name="photo" class="form-control">
            </div>
          </div>
        <input type="hidden" name="user_id" value="{{ $user->id }}">
    </div>

</div>