<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function Recipe()
    {
        return $this->belongsToMany('App\Recipe');
    }
}
