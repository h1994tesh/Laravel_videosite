<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
