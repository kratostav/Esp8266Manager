<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model {

	protected $table = 'values';
	public $timestamps = true;

	public function device()
	{
		return $this->belongsTo('App\Device', 'id','did');
	}

}