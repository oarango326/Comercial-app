<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    //protected $table=['Articulos'];
    //protected $fillable = ['codigo','nombre','ean', 'fabricante_id','categoria_id'];

    public function Categoria(){
       return $this->belongsTo(Categoria::class);
    }

    public function Fabricante(){
        return $this->belongsTo(Fabricante::class);
     }
}
