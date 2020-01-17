<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    //
    protected $fillable = ['cliente_id',
                            'direccion',
                            'fabricante_id',
                            'facnum',
                            'tipodoc',
                            'facfecha',
                            'total',
                            'saldo'];

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function Fabricante(){
        return $this->belongsTo(Fabricante::class);
    }

    public function cobro(){
        return $this->hasMany(cobro::class);
    }
}
