<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{

    protected $fillable=['nombre'];


    public function Articulo(){
        return $this->hasMany(Articulo::class);
    }

    public function Factura(){
        return $this->hasMany(Factura::class);
    }


}
