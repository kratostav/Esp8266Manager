<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueAcc extends Model
{

    public $timestamps = true;
    protected $table = 'valuesAcc';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'minTemp','maxTemp','avgTemp', 'minHum','maxHum','avgHum','did','lastEntry','date','count'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function device()
    {
        return $this->belongsTo('App\Device', 'id', 'did');
    }

}