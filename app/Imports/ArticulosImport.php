<?php

namespace App\Imports;

use App\Articulo;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class Articulosimport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Articulo([
            'articulo_id'   => $row['articulo_id'],
            'codigo'        => $row['codigo'],
            'nombre'        => $row['nombre'],
            'detalle'      => $row['detalle'],
            'ean'           => $row['ean'],
            'precio'        => $row['precio']
        ]);
    }
    public function chunkSize(): int
    {
        return 4000;
    }
}
