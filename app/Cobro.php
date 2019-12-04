<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    //
    protected $fillable = ['cliente_id',
                            'fechacobro',
                            'tipodocumento',
                            'numdocumento',
                            'fechadocumento',
                            'tipocobro',
                            'monto',
                            'abono'];

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function DetalleCobro(){
        return $this->hasMany(DetalleCobro::class);
    }
}
