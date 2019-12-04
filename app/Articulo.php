<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    //protected $table=['Articulos'];
    protected $fillable = ['codigo','nombre','ean','precio', 'fabricante_id','categoria_id','activo'];

    public function Categoria(){
       return $this->belongsTo(Categoria::class);
    }

    public function Fabricante(){
        return $this->belongsTo(Fabricante::class);
     }
}
