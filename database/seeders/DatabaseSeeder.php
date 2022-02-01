<?php

namespace Database\Seeders;

use App\Models\Todo;
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
        Todo::factory(20)->create();

        User::create([
            'username' => 'Urusai',
            'email' => 'yunianrezky031@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
