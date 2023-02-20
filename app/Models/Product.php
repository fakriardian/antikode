<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $fillable = [
        "brand_id",
        "name",
        "picture",
        "price",
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
