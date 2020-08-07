<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /* Beziehung des Category Models */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
