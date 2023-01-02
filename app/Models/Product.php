<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attributes()
    {
        return $this->hasMany(Attribute::class)
            ->where('status', 'available');
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class)->withPivot('attribute_id');
    }
}
