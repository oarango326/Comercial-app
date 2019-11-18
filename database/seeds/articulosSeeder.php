<?php

use App\Articulo;
use Illuminate\Database\Seeder;

class articulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Articulo::class, 48)->create();

    }

}
