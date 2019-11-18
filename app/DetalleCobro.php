<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCobro extends Model
{
    //
    public function Cobro(){
        return $this->hasOne(Cobro::class);
    }
}
