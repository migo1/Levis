<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'leave_type'
    ];

    public function leaveRequests() {
        return $this->hasMany('App\LeaveRequest');
    }
}
