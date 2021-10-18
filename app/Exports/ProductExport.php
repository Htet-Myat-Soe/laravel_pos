<?php

namespace App\Exports;

use App\Models\Category;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromQuery , WithHeadings ,WithMapping
{
    use Exportable;

    protected $products;

    public function __construct($products)
    {

        $this->products = $products;
    }

    public function headings(): array
    {
        return [
            'Product ID',
            'Name',
            'Category',
            'Price',
            'Cost',
            'Barcode Type',
            'Quantity',
            'Tax',
            'Tax Type',
            'Unit',
            'Description',
            'Created at',
        ];
    }

    public function map($product): array
    {
        return [

            $product->product_code,
            $product->name,
            $product->category->name,
            $product->price,
            $product->cost,
            $product->barcode,
            $product->quantity,
            $product->tax,
            $product->tax_type,
            $product->unit,
            $product->description,
            $product->created_at->format('d-m-Y'),

        ];
    }

    public function query()
    {
        return Product::query()->whereKey($this->products);
    }
}
