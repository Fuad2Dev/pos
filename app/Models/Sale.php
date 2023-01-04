<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Support\Carbon;
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


    public function scopeToday()
    {
        return $this->whereDate('created_at', Carbon::today());
    }

    public function scopeYesterday()
    {
        return $this->whereDate('created_at', Carbon::yesterday());
    }

    public function scopeThisWeek()
    {
        return $this->whereBetween('created_at', [Carbon::today()->startOfWeek(), Carbon::today()->endOfWeek()]);
    }

    public function scopeLastWeek()
    {
        return $this->whereBetween('created_at', [Carbon::today()->startOfWeek()->subWeek(), Carbon::today()->startOfWeek()]);
    }

    public function scopeThisMonth()
    {
        return $this->whereBetween('created_at', [Carbon::today()->startOfMonth(), Carbon::today()->endOfMonth()]);
    }

    public function scopeLastMonth()
    {
        return $this->whereBetween('created_at', [Carbon::today()->startOfMonth()->subMonth(), Carbon::today()->startOfMonth()]);
    }

    public function scopeThisYear()
    {
        return $this->whereBetween('created_at', [Carbon::today()->startOfYear(), Carbon::today()->endOfYear()]);
    }
}
