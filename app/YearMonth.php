<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearMonth extends Model
{
    public function raports()
    {
        return $this->hasMany('App\Rapport');
    }
}
