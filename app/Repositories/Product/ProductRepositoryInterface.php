<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);

    public function getRemoved();

    public function getRemovedById($id);

    public function restoreRemoved($id);

    public function forceDelete($id);

    public function storeProductDetails($id, array $attributes);
}