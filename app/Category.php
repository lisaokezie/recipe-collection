<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
