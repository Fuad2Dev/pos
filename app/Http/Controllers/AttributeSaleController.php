<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Sale $sale)
    {
        // $products = Product::all();
        return view('sale.addProduct', compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function search(Sale $sale)
    {

        $product = Product::when(request()->category, function ($query) {
            return $query->where('category', request()->category);
        })
            ->when(request()->brand, function ($query) {
                return $query->where('brand', request()->brand);
            });

        $product = $product->first();

        $product->load('attributes');

        return view('sale.addProduct', compact('product', 'sale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sale $sale, Attribute $attribute)
    {
        $attribute->update(['sale_id' => $sale->id]);

        return redirect()->route('sale.show', $sale);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(request());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale, Attribute $attribute)
    {
        // TODO: #1 modify relation to sale <=> attribute for easier querying
        // $sale->attributes()->detach($attribute->id);
        $attribute->update(['sale_id' => null]);

        return redirect()->route('sale.show', $sale);
    }
}
