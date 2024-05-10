<?php

namespace Database\Seeders;

use App\Constants\UserRoles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query();

        $user->create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin'),
            'role' => UserRoles::ADMIN->value,
            'phone' => '+77769292220'
        ]);

        $user->create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('password1'),
            'role' => UserRoles::USER->value,
            'phone' => '+77774762019'
        ]);

    }
}
