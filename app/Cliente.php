<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table='clientes';

	public function visita()
	{
		return $this->hasMany(Visita::class);
    }

    public function Cobro(){
        return $this->hasMany(Cobro::class);
    }

    public function Factura(){
        return $this->hasMany(Factura::class);
    }

	protected $fillable = [
        'nombre',
        'cif',
        'direccion',
        'ciudad',
        'estado',
        'cp',
        'telefono',
        'email',
    ];

}
