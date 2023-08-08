<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrcreate([
            'name' => 'Linkedineker',
            'email' => 'linkedineker@teste.com',
            'password' => Hash::make('123456')
        ]);

        User::factory()->count(29)->create();

    }
}
