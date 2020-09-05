<?php

namespace App\Repositories\Product;

use App\Product;

class ProductRepository implements ProductRepositoryInterface
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->where('active', '0')->latest()->paginate(10);
    }

    public function getById($id)
    {
        return $this->product->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->product->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $new = $this->product->findOrFail($id);

        return $new->update($attributes);
    }

    public function delete($id)
    {
        return $this->product->findOrFail($id)->delete();
    }

    public function getRemoved()
    {
        return $this->product->onlyTrashed()->get();
    }

    public function getRemovedById($id)
    {
        return $this->product->onlyTrashed()->findOrFail($id);
    }

    public function restoreRemoved($id)
    {
        return $this->product->onlyTrashed()->findOrFail($id)->restore();
    }

    public function forceDelete($id)
    {
        return $this->product->onlyTrashed()->findOrFail($id)->forceDelete();
    }

    public function storeProductDetails($id, array $attributes)
    {
        $product = $this->product->findOrFail($id);

        return $product->productDetails()->create($attributes);
    }
}
