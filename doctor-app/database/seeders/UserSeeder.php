<?php

namespace Database\Seeders;

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
            'password'=>bcrypt('admin')
        ]);

        $user->create([
            'name'=>'Moderator',
            'email'=>'moderator@gmail.com',
            'password'=>bcrypt('moderator')
        ]);
        $user->create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('password1')
        ]);

    }
}
