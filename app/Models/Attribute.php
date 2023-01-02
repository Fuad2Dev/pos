<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    // TODO: find out if it's better to use the fillable property
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
