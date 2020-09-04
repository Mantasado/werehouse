<?php

namespace App;

use Carbon\Carbon;
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
        $date = Carbon::now()->subDays(90);
        return $this->hasMany(ProductDetails::class)->where('created_at', '>', $date);
    }
}
