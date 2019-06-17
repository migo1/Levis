<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name'
    ];

    public function files() {
        return $this->hasMany('App\File');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Client', 'transaction_client');
    }
}
