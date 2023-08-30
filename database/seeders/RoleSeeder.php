<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Editor',
            'User',
            'Guest',
        ];
        foreach ($roles as $key => $role) {
            $newRole = new Role();
            $newRole->name = $role;
            $newRole->level = $key;
            $newRole->save();
        };
    }
}
