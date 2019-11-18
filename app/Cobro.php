<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    //

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function DetalleCobro(){
        return $this->hasMany(DetalleCobro::class);
    }
}
