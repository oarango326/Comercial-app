<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    //
    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function Fabricante(){
        return $this->belongsTo(Fabricante::class);
    }
}
