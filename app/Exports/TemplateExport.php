<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class TemplateExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dd(collect([
        //     0 => ['category', 'brand', 'color']
        // ]));
        // dd(Product::all());
        return collect([
            0 => ['Category', 'Brand', 'Color', 'Size', 'Price', 'Description']
        ]);
    }
}
