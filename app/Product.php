<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'ean',
        'product_type_id',
        'color',
        'image'
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
