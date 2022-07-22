<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Factories\userFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            "nombre" => "Miguel",
            "apellido" => "Berrio",
            "cargo" => "administrador",
            "usuario" => "miguel",
            "password" => Hash::make("123")
        ]);
    }
}
