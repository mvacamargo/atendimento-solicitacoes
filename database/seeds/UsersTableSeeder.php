<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'Marcus',
            'email' => 'marcusvc@unicamp.br',
            'password' => Hash::make('teste123'),
            'ativo' => true
        ]);
    }
}
