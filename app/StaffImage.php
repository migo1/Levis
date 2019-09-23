<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffImage extends Model
{
    protected $fillable = [
        'user_id', 'photo'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
