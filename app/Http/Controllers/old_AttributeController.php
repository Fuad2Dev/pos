<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function destroy(Product $product, Attribute $attribute)
    {
        // TODO: prevent deletion of unavailable or in-sale products
        $attribute->delete();

        if ($product->attributes->count() > 0) {
            return redirect()->route('product.show', $product);
        } else
            $product->delete();

        return redirect()->route('product.index');
    }

    public function edit(Product $product, Attribute $attribute)
    {

        return view('product.edit', compact('product', 'attribute'));
    }
}
