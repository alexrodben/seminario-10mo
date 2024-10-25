<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ahora Laravel reconoce la función 'collect'
        $users = collect([
            [
                'name' => 'Katherine Escolin',
                'email' => 'escolinkate@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Adminroot.148'),
                'created_at' => now(),
                'updated_at' => now(),
                'uuid' => Str::uuid(),
                'photo' => 'admin.jpg'
            ],
            [
                'name' => 'Vivian Escolin',
                'email' => 'melissaalvarez1227@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Adminroot'),
                'created_at' => now(),
                'updated_at' => now(),
                'uuid' => Str::uuid(),
                'photo' => 'admin.jpg'
            ],
            [
                'name' => 'Diana Escolin',
                'email' => 'melissagonzalez1272@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Adminroot'),
                'created_at' => now(),
                'updated_at' => now(),
                'uuid' => Str::uuid(),
                'photo' => 'admin.jpg'
            ]
        ]);

        // Inserción masiva
        User::insert($users->toArray());
    }
}
