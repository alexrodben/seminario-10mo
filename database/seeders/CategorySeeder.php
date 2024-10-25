<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect([
            [
                'id' => 1,
                'name' => 'Alimentos',
                'slug' => 'alimentos',
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Bebidas',
                'slug' => 'bebidas',
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Productos enlatados',
                'slug' => 'productos-enlatados',
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Cereales y granos',
                'slug' => 'cereales-y-granos',
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Lácteos',
                'slug' => 'lacteos',
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Aceites y grasas',
                'slug' => 'aceites-y-grasas',
                'user_id' => 1,
            ],
            [
                'id' => 7,
                'name' => 'Condimentos y especias',
                'slug' => 'condimentos-y-especias',
                'user_id' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Pan y tortillas',
                'slug' => 'pan-y-tortillas',
                'user_id' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Frutas y verduras',
                'slug' => 'frutas-y-verduras',
                'user_id' => 1,
            ],
            [
                'id' => 10,
                'name' => 'Higiene personal',
                'slug' => 'higiene-personal',
                'user_id' => 1,
            ],
            [
                'id' => 11,
                'name' => 'Jabones y detergentes',
                'slug' => 'jabones-y-detergentes',
                'user_id' => 1,
            ],
            [
                'id' => 12,
                'name' => 'Papel higiénico',
                'slug' => 'papel-higienico',
                'user_id' => 1,
            ],
            [
                'id' => 13,
                'name' => 'Desinfectantes',
                'slug' => 'desinfectantes',
                'user_id' => 1,
            ],
            [
                'id' => 14,
                'name' => 'Productos de limpieza',
                'slug' => 'productos-de-limpieza',
                'user_id' => 1,
            ],
            [
                'id' => 15,
                'name' => 'Medicamentos básicos',
                'slug' => 'medicamentos-basicos',
                'user_id' => 1,
            ],
            [
                'id' => 16,
                'name' => 'Vitaminas y suplementos',
                'slug' => 'vitaminas-y-suplementos',
                'user_id' => 1,
            ],
            [
                'id' => 17,
                'name' => 'Ropa de abrigo',
                'slug' => 'ropa-de-abrigo',
                'user_id' => 1,
            ],
            [
                'id' => 18,
                'name' => 'Artículos de primeros auxilios',
                'slug' => 'articulos-primeros-auxilios',
                'user_id' => 1,
            ],
            [
                'id' => 19,
                'name' => 'Agua embotellada',
                'slug' => 'agua-embotellada',
                'user_id' => 1,
            ],
            [
                'id' => 20,
                'name' => 'Productos para bebés',
                'slug' => 'productos-para-bebes',
                'user_id' => 1,
            ],
        ]);

        $categories->each(function ($category) {
            Category::insert($category);
        });
    }
}