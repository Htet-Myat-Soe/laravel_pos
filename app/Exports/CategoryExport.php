<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoryExport implements FromQuery , WithHeadings ,WithMapping
{
    use Exportable;

    protected $categories;

    public function __construct($categories)
    {

        $this->categories = $categories;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Product Count',
            'Created at',
        ];
    }

    public function map($category): array
    {
        return [
            $category->id,
            $category->name,
            $category->product_count,
            $category->created_at->format('d-m-Y'),

        ];
    }

    public function query()
    {
        return Category::query()->whereKey($this->categories);
    }
}
