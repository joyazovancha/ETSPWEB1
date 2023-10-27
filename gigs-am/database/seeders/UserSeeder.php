<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role_name' => 'Admin',
            'password' => bcrypt('123123123'),
        ]);

        $role = Role::where('name', 'Admin')->first();
        if ($role) {
            $user->roles()->attach($role);
        }



    }
}
