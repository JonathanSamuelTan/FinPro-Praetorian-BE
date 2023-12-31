<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        \App\Models\User::factory()->create([
            'name' => 'LnTBNCC',
            'email' => 'LnT@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '085887001918',
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'U@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '085887001918',
            'role' => 'user',
        ]);

        $this->call(ProductSeeder::class);
    }
}
