<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'unit_id');
    }
}
