<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    public function user(){
        return $this->brelongsTo(User::class);
    }
}
