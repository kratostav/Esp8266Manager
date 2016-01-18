<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    public $timestamps = true;
    protected $table = 'devices';

    public function values()
    {
        return $this->hasMany('App\Value', 'did', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'uid');
    }

}