<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['RoleID' => 1, 'RoleName' => 'user', 'created_at' => now(), 'updated_at' => now()],
            ['RoleID' => 2, 'RoleName' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
