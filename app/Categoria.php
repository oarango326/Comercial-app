<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable=['nombre'];

    public function Articulo(){
        return $this->hasMany(Articulo::class);
    }
}
