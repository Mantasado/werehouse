<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductTypeRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    private $ProductRepository;
    private $productTypeRepository;

    public function __construct(ProductRepositoryInterface $productRepository, ProductTypeRepositoryInterface $productTypeRepository)
    {
        $this->ProductRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
    }

    public function getAllProducts()
    {
        return $this->ProductRepository->getAll();
    }

    public function createProduct($request)
    {
        $validateData = $this->requestValidation($request);

        if(request()->has('image'))
        {
            $validateData['image'] = $this->storeImage();
        }

        return $this->ProductRepository->create($validateData);
    }

    public function getAllProductTypes()
    {
        return $this->productTypeRepository->getAll();
    }

    public function findProductById($id)
    {
        return $this->ProductRepository->getById($id);
    }

    public function updateProduct($id, $request)
    {
        $validateData = $this->requestValidation($request);

        if(request()->has('image'))
        {
            $validateData['image'] = $this->storeImage();
        }

        return $this->ProductRepository->update($id, $validateData);
    }

    public function deleteProduct($id)
    {
        return $this->ProductRepository->delete($id);
    }

    public function getRemovedProducts()
    {
        return $this->ProductRepository->getRemoved();
    }
    
    public function restoreRemovedProduct($id)
    {
        return $this->ProductRepository->restoreRemoved($id);
    }

    public function forceDeleteProduct($id)
    {
        $product = $this->ProductRepository->getRemovedById($id);
        $this->deleteStoredImage($product->image);

        return $this->ProductRepository->forceDelete($id);
    }

    public function createProductDetails($id, $request)
    {
        $validateData = $request->validate([
            'quantity' => 'required|digits_between:1,11',
            'price' => 'required|regex:/^[0-9]*\.?[0-9]{2}+$/'
        ]);

        return $this->ProductRepository->storeProductDetails($id, $validateData);
    }

    public function requestValidation($request)
    {
        return $request->validate([
            'name' => 'required|max:50',
            'ean' => 'required|digits:13',
            'product_type_id' => 'required',
            'color' => 'required|alpha|max:20',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }

    public function storeImage()
    {
        $imageDirectory = 'public/images';

        if(!Storage::files($imageDirectory))
        {
            Storage::makeDirectory($imageDirectory);
        };
        return request()->image->store('images', 'public');

    }

    public function deleteStoredImage($imageName) {

        $default = 'images/no_image.png';

        if($imageName != $default)
        {
            Storage::delete('public/' .$imageName);
        }

    }
}
