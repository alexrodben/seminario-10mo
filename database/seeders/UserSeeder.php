<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect([
            [
                'name' => 'Katherine Escolin',
                'email' => 'escolinkate@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('Adminroot.148'),
                'created_at' => now(),
                'uuid' => Str::uuid(),
                'photo' => 'admin.jpg'
            ],
            [
                'name' => 'Vivian Escolin',
                'email' => 'melissaalvarez1227@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('Adminroot'),
                'created_at' => now(),
                'uuid' => Str::uuid(),
                'photo' => 'admin.jpg'
            ],
            [
                'name' => 'Diana Escolin',
                'email' => 'melissagonzalez1272@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('Adminroot'),
                'created_at' => now(),
                'uuid' => Str::uuid(),
                'photo' => 'admin.jpg'
            ]
        ]);

        $users->each(function ($user) {
            User::insert($user);
        });
    }
}
