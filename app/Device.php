<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	protected $table = 'devices';
	public $timestamps = true;

	public function values()
	{
		return $this->hasMany('App\Value', 'did','id');
	}
	public function device()
	{
		return $this->belongsTo('App\User', 'id','uid');
	}

}