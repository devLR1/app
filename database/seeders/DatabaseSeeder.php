<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();
        \App\Models\Target::factory(50)->create();
        User::create([
            'ime' => 'admin',
            'prezime' => ' ',
            'username' => 'admin',
            'password' => Hash::make('luka1234'),
            'razur' => 1,
            'is_admin' => true
        ]);
    }
}
