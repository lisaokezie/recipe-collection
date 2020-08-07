<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    /* Beziehungen des Comment Models */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
