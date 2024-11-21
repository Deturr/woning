<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Tobijas',
            'email' => 'student@student.nl',
            'password' => bcrypt('tobijas'), // bcrypt is used to hash the password
        ]);
    }
    
}

