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
            'name' => 'Marcus',
            'email' => 'marcusvc@unicamp.br',
            'password' => Hash::make('12345')
        ]);
        User::create([
            'name' => 'Anderson',
            'email' => 'alemao@unicamp.br',
            'password' => Hash::make('12345')
        ]);
    }
}
