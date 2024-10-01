<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = collect([
            [
                'name' => 'Hojas',
                'slug' => 'hojas',
                'short_code' => 'hj',
                'user_id'=>1
            ],
            [
                'name' => 'Cajas',
                'slug' => 'caja',
                'short_code' => 'cj',
                'user_id'=>1
            ],
            [
                'name' => 'Pieza',
                'slug' => 'pieza',
                'short_code' => 'pz',
                'user_id'=>1
            ]
        ]);

        $units->each(function ($unit){
            Unit::insert($unit);
        });
    }
}
