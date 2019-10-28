<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    protected $fillable = [
        'user_id','payroll_id','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
    use \Znck\Eloquent\Traits\BelongsToThrough;

    public function payroll()
    {
        return $this->belongsTo('App\Payroll');
    }
}
