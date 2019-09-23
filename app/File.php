<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [

        'transaction_id','court_day','description','client_id','request'
        ,'reason', 'user_id', 'request_reply', 'reason_reply'

    ];

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function user() {
        return $this->belongsTo('App\user');
    }

}
