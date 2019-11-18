<?php
use App\Categoria;
use Illuminate\Database\Seeder;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Categoria::truncate();
       // $categoria=new Categoria();
        factory(Categoria::class, 10)->create();
    }
}
