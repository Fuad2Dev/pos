<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'category' => $row['category'],
            'brand' => $row['brand'],
            'color' => $row['color'],
            'size' => $row['size'],
            'price' => $row['price'],
            'description' => $row['description']
        ]);
    }
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'category' => 'required',
            'brand' => 'required',
            'color' => 'required',
            'size' => 'required',
            'price' => 'required',
        ];
    }
}
