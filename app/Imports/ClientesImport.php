<?php

namespace App\Imports;

use App\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ClientesImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cliente([
            'nombre'    => $row['nombre'],
            'cif'       => $row['cif'],
            'direccion' => $row['direccion'],
            'ciudad'    => $row['ciudad'], 
            'estado'    => $row['estado'],
            'cp'        => $row['cp'],  
            'telefono'  => $row['telefono'],
            'email'    => $row['email'], 
            //
        ]);
    }

    public function chunkSize(): int
    {
        return 2000;
    }
}
