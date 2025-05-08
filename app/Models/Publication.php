<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{

    
    public function category() {
        return $this->belongsToMany('App\Models\Category');
    }

}
