<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Llama al método para generar varios productos
        $products = $this->generateProducts(20); // Genera 20 productos

        // Inserta cada producto
        $products->each(function ($product) {
            Product::create($product);
        });
    }

    /**
     * Genera un conjunto de productos con nombres textuales y categorías asociadas.
     *
     * @param int $count
     * @return \Illuminate\Support\Collection
     */
    private function generateProducts(int $count)
    {
        $products = collect();

        // Lista de nombres de productos de ejemplo con categorías asociadas
        $productData = [
            ['name' => 'Arroz Blanco', 'category_id' => 1], // Alimentos
            ['name' => 'Harina de Maíz', 'category_id' => 1], // Alimentos
            ['name' => 'Azúcar Refinada', 'category_id' => 1], // Alimentos
            ['name' => 'Frijoles Negros', 'category_id' => 1], // Alimentos
            ['name' => 'Aceite de Cocina', 'category_id' => 6], // Aceites y grasas
            ['name' => 'Leche en Polvo', 'category_id' => 5], // Lácteos
            ['name' => 'Sal Yodada', 'category_id' => 7], // Condimentos y especias
            ['name' => 'Papel Higiénico', 'category_id' => 12], // Papel higiénico
            ['name' => 'Jabón de Tocador', 'category_id' => 10], // Higiene personal
            ['name' => 'Detergente en Polvo', 'category_id' => 11], // Jabones y detergentes
            ['name' => 'Pasta Dental', 'category_id' => 10], // Higiene personal
            ['name' => 'Atún en Lata', 'category_id' => 3], // Productos enlatados
            ['name' => 'Sardinas en Lata', 'category_id' => 3], // Productos enlatados
            ['name' => 'Mantequilla de Maní', 'category_id' => 1], // Alimentos
            ['name' => 'Galletas de Soda', 'category_id' => 1], // Alimentos
            ['name' => 'Café Instantáneo', 'category_id' => 2], // Bebidas
            ['name' => 'Té Verde', 'category_id' => 2], // Bebidas
            ['name' => 'Leche Condensada', 'category_id' => 5], // Lácteos
            ['name' => 'Cereal de Avena', 'category_id' => 4], // Cereales y granos
            ['name' => 'Lentejas', 'category_id' => 4], // Cereales y granos
        ];

        for ($i = 0; $i < $count; $i++) {
            $name = $productData[$i]['name'];
            $slug = Str::slug($name); // Genera un slug a partir del nombre
            $category_id = $productData[$i]['category_id']; // Asigna la categoría correcta

            $products->push([
                'name' => $name,
                'slug' => $slug,
                'code' => sprintf('%03d', $i + 1), // Código formateado con tres dígitos
                'quantity' => rand(50, 100), // Cantidad aleatoria entre 5 y 100
                'unit_id' => rand(1, 3), // Unidad aleatoria entre 1 y 3
                'notes' => null,
                'category_id' => $category_id, // Asigna la categoría según el producto
                'user_id' => 1, // Usuario fijo, puede ser dinámico si lo necesitas
                'uuid' => Str::uuid(),
                'product_image' => 'assets/img/products/' . $name . '.png', // Imagen por defecto
            ]);
        }

        return $products;
    }
}