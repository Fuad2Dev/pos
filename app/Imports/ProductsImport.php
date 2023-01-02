<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToCollection, WithHeadingRow, WithValidation
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
    /**
     * @param \Illuminate\Support\Collection $collection
     * @return mixed
     */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        foreach ($collection as $row) {
            // Product::make([
            //     'category' => $row['category'],
            //     'brand' => $row['brand'],
            //     'color' => $row['color'],
            //     'size' => $row['size'],
            //     'price' => $row['price'],
            //     'description' => $row['description']
            // ]);

            $find = [
                'category' => $row['category'],
                'brand' => $row['brand'],
                'price' => $row['price'],
            ];

            $new = [
                'color' => $row['color'],
                'size' => $row['size'],
                'description' => $row['description'],
            ];

            $product = Product::firstOrCreate($find);
            $product->attributes()->create($new);
        }
    }
}
