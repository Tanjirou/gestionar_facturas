<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'codigo' => '1234',
            'descripcion' => 'Raton de bolita',
            'cantidad' => 20,
            'precio' => 30,
            'estatus' => 'A',
            'impuesto' =>0.1
        ]);
        DB::table('productos')->insert([
            'codigo' => '2345',
            'descripcion' => 'Teclado',
            'cantidad' => 40,
            'precio' => 50,
            'estatus' => 'A',
            'impuesto' =>0.3
        ]);
    }
}
