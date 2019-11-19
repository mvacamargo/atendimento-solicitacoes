<?php

use App\Models\TipoServico;
use Illuminate\Database\Seeder;

class TipoServicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoServico::create([
            'descricao' => 'Manutenção em Hardware'
        ]);
        TipoServico::create([
            'descricao' => 'Manutenção em Software'
        ]);
    }
}
