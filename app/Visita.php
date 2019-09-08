<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Visita extends Model
{
	protected $table='visitas';
    protected $fillable = ['cliente_id','estado', 'proxVisita','comentario'];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class);
	}

}
