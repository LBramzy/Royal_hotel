<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'phone' => '08101435587',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        // $this->call([
        //     RoleSeeder::class,
        // ]);
    }
}
