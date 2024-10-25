<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class ProductExportController extends Controller
{
    public function create()
    {
        $products = Product::all()->sortBy('product_name');

        $product_array[] = array(
            'Producto',
            'Slug',
            'No. de Categoría',
            'No. de Unidad',
            'Código de producto',
            'Cantidad de stock',
            // 'Product Image',
            "Nota"
        );

        foreach ($products as $product) {
            $product_array[] = array(
                'Nombre de producto' => $product->name,
                'Slug' => $product->slug,
                'No. Categoría' => $product->category_id,
                'No. Unidad' => $product->unit_id,
                'Código de producto' => $product->code,
                'inventario' => $product->quantity,
                // 'Foto de producto' => $product->product_image,
                "Nota" => $product->note
            );
        }

        $this->store($product_array);
    }

    public function store($products)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');

        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($products);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="products.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }
}
