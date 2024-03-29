<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function leaveRequests() {
        return $this->hasMany('App\LeaveRequest');
    }

    public function files() {
        return $this->hasMany('App\Files');
    }

    public function staff_detail() {
        return $this->hasOne('App\StaffDetail');
    }

    public function staff_image() {
        return $this->hasOne('App\StaffImage');
    }

    public function payrolls() {
        return $this->hasMany('App\Payroll');
    }

    public function payments() 
    {
        return $this->hasMany('App\Payment');
    }
}
