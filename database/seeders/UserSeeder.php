<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            "name" => "chitchit",
            "email" => "chitchit@gmail.com",
            "password" => Hash::make("asdffdsa")
        ]);

        User::factory(10)->create();

        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "email_verified_at" => now(),
            "password" => Hash::make("admin"),
            "role" => "admin"
        ]);
    }
}
