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
        return $this->product->paginate(10);
    }

    public function getById($id)
    {
        return $this->product->findById($id);
    }

    public function create(array $attributes)
    {
        return $this->product->created($attributes);
    }

    public function update($id, array $attributes)
    {
        $new = $this->product->findOrFail($id);

        return $new->update($attributes);
    }

    public function delete($id)
    {
        return $this->product->getById($id)->delete();
    }
}
