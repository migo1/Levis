<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffDetail extends Model
{
    protected $table = 'staff_details';


    protected $fillables = ['user_id', 'DOB', 'gender', 'id_number', 'staff_id', 'mobile_number',
                            'NHIF_number', 'NSSF_number', 'employment_date', 'status', 
                             ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
