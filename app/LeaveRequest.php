<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    //protected $table = 'leave_requests';

    protected $fillable = [
        'user_id', 'leave_id', 'from', 'to', 'days_diff', 'reason', 'response', 'reply','remainder'
    ];
    
    protected $dates = ['from', 'to'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function leave() {
        return $this->belongsTo('App\Leave');
    }
}
