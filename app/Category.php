<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
