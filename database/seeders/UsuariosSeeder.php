<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Maria Torrealba',
            'email' => 'maria@correo.com',
            'password'=> Hash::make(12345678),
            'tipo_usuario' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Pedro Perez',
            'email' => 'pedro@gmail.com',
            'password'=> Hash::make(987654321),
            'tipo_usuario' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Alberto Gutierrez',
            'email' => 'gutierrez@gmail.com',
            'password'=> Hash::make(12345678),
            'tipo_usuario' => 1
        ]);
    }
}
