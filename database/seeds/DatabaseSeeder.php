<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(TipoServicosTableSeeder::class);
        $this->call(UnidadeTemposTableSeeder::class);
        $this->call(ComplexidadesTableSeeder::class);
        $this->call(SolicitacaosTableSeeder::class);
    }
}
