<?php

namespace App\Repositories\Product;

use App\ProductType;

class ProductTypeRepository implements ProductTypeRepositoryInterface
{

    private $productType;

    public function __construct(ProductType $productType)
    {
        $this->productType = $productType;
    }

    public function getAll()
    {
        return $this->productType->get();
    }

}
