<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{

    public $timestamps = true;
    protected $table = 'values';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function device()
    {
        return $this->belongsTo('App\Device', 'id', 'did');
    }

}