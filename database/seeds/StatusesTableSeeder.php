<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'descricao' => 'Inicial'
        ]);
        Status::create([
            'descricao' => 'Em Execução'
        ]);
        Status::create([
            'descricao' => 'Encerrada'
        ]);
    }
}
