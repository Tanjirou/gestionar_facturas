<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            'descripcion' => 'Administrador'
        ]);
        DB::table('tipo_usuarios')->insert([
            'descripcion' => 'Cliente'
        ]);
    }
}
