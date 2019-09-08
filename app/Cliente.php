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
