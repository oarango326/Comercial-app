<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    public function Articulo(){
        return $this->hasMany(Articulo::class);
    }
}
