<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles first
        $this->call([
            RolesTableSeeder::class,
        ]);

        // Now create users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'RoleID' => 1, // Ensure this matches a RoleID in the roles table
        ]);
    }
}
