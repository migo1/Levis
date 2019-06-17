<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'transaction_id','court_day','description','client_id','reference'
    ];

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

    public function client() {
        return $this->belongsTo('App\Client');
    }
}
