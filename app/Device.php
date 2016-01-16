<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	protected $table = 'devices';
	public $timestamps = true;

	public function values()
	{
		return $this->hasMany('Device', 'did','id');
	}

}