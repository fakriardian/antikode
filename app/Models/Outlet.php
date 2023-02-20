<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    public $incrementing = false;

    protected $fillable = [
        "brand_id",
        "name",
        "picture",
        "address",
        "longitude",
        "latitude",
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
