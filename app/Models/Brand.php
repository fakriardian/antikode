<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $incrementing = false;

    protected $fillable = [
        "name",
        "logo",
        "banner",
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function outlets()
    {
        return $this->hasMany(Outlet::class);
    }
}
