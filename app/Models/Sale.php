<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['client', 'note'];

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class)->withPivot('attribute_id')
    //         ->join('attributes', 'product_sale.attribute_id', '=', 'attributes.id')
    //         ->select('attributes.size as pivot_attribute_size', 'products.*')
    //         ;
    //     // ->join('providers', 'material_part.provider_id', '=', 'providers.id')
    //     //     ->select('providers.name as pivot_providers_name', 'materials.*');
    // }



    public function attributes()
    {
        return $this->hasMany(Attribute::class)
            ->join('products', 'attributes.product_id', '=', 'products.id')
            ->select('products.price', 'attributes.*');
    }
}
