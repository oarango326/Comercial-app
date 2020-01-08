<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    //protected $table=['Articulos'];
    protected $fillable = ['articulo_id','codigo','nombre','detalle','ean','img_src','precio', 'fabricante_id','categoria_id','activo'];

    public function Categoria(){
       return $this->belongsTo(Categoria::class);
    }

    public function Fabricante(){
        return $this->belongsTo(Fabricante::class);
     }

    public function Detallecobro(){
        return $this->belongsToMany(Detallecobro::class);
     }
}
