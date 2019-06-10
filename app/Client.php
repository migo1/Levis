<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Client extends Model
{
    
    protected $fillable = [
        'uuid','name','email','mobile_no'
    ];


    public static function boot()
	{
		parent::boot();
		self::creating(function ($model) {
			$model->uuid = (string) Uuid::generate();
		});
    }
    
  //  public function getRouteKeyName()
//	{
//		return 'uuid';
//	}
}
