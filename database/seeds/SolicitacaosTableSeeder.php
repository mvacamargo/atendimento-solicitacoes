<?php

use Illuminate\Database\Seeder;

class SolicitacaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Solicitacao::class, 20)->create()->make();
    }
}
