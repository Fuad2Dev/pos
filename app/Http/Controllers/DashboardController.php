<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function summary()
    {

        $summary = collect([
            'Today' => Sale::today()->with('attributes')->get(),
            'Yesterday' => Sale::yesterday()->with('attributes')->get(),
            'This Week' => Sale::thisWeek()->with('attributes')->get(),
            'Last Week' => Sale::lastWeek()->with('attributes')->get(),
            'This Month' => Sale::thisMonth()->with('attributes')->get(),
            'Last Month' => Sale::lastMonth()->with('attributes')->get(),
            'This Year' => Sale::thisYear()->with('attributes')->get(),
        ]);

        return view('dashboard.summary', compact('summary'));
    }

    public function stock()
    {
        $stock = request()->stock ?? 0;

        $products = Product::has('attributes', '=', $stock)->get();
        // dd($products);
        return view('dashboard.stock', compact('products'));
    }

    public function chart()
    {
        dd('chart');
    }
}
