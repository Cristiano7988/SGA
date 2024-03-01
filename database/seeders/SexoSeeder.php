<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexo')->insert([
            ['tipo' => 'Não Informado'],
            ['tipo' => 'Feminino'],
            ['tipo' => 'Masculino'],
            ['tipo' => 'Intersexo']
        ]);
    }
}
