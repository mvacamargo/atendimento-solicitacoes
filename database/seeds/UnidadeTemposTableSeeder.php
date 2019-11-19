<?php

use App\Models\UnidadeTempo;
use Illuminate\Database\Seeder;

class UnidadeTemposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadeTempo::create([
            'descricao' => 'Horas'
        ]);
        UnidadeTempo::create([
            'descricao' => 'Minutos'
        ]);
    }
}
