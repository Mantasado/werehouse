<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'ean',
        'color'
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetails::class);
    }
}
