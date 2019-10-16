<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'user_id', 'basic', 'house_allowance', 'medical_allowance', 'other_allowance', 'gross_pay',
        'PAYE', 'NSSF', 'NHIF', 'deductions', 'relief', 'net_pay'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
