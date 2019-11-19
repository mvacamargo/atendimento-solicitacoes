<?php

use App\Models\Complexidade;
use Illuminate\Database\Seeder;

class ComplexidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complexidade::create([
            'descricao' => 'Alta'
        ]);
        Complexidade::create([
            'descricao' => 'Baixa'
        ]);
        Complexidade::create([
            'descricao' => 'Indefinida'
        ]);
        Complexidade::create([
            'descricao' => 'Média'
        ]);
        Complexidade::create([
            'descricao' => 'Média-Alta'
        ]);
        Complexidade::create([
            'descricao' => 'Média-Baixa'
        ]);
    }
}
