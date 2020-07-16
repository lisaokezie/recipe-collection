<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function Category()
    {
        return $this->hasOne('App\Category', 'foreign_key');
    }
}
