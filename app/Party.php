<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
        'transaction_id', 'name'
    ];
    

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

    public function files() {
        return $this->hasMany('App\File');
    }
}
