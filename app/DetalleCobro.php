<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCobro extends Model
{
    //

    protected $table='detallecobros';

    public function Cobro(){
        return $this->hasOne(Cobro::class);
    }
}
