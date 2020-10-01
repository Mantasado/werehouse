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

    /**
     * Display a listing of the resource.
     *
     */

    public function getAllProducts()
    {
        return $this->ProductRepository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function createProduct($request)
    {
        if(request()->has('image'))
        {
            $request['image'] = $this->storeImage();
        }

        return $this->ProductRepository->create($request);
    }

    /**
     * Display a listing of the resource.
     *
     */

    public function getAllProductTypes()
    {
        return $this->productTypeRepository->getAll();
    }

    /**
     * Display the specified resource.
     *
     */

    public function findProductById($id)
    {
        return $this->ProductRepository->getById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     */

    public function updateProduct($id, $request)
    {
        if(request()->has('image'))
        {
            $request['image'] = $this->storeImage();
        }

        return $this->ProductRepository->update($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     */

    public function deleteProduct($id)
    {
        return $this->ProductRepository->delete($id);
    }

    /**
     * Display the specified resource.
     *
     */

    public function getRemovedProducts()
    {
        return $this->ProductRepository->getRemoved();
    }
    
    /**
     * Restore the specified resource that was soft deleted.
     *
     */

    public function restoreRemovedProduct($id)
    {
        return $this->ProductRepository->restoreRemoved($id);
    }

    /**
     * Remove the specified soft deleted resource from storage.
     *
     */

    public function forceDeleteProduct($id)
    {
        $product = $this->ProductRepository->getRemovedById($id);
        $this->deleteStoredImage($product->image);

        return $this->ProductRepository->forceDelete($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     */

    public function createProductDetails($id, $request)
    {
        $validateData = $request->validate([
            'quantity' => 'required|digits_between:1,11',
            'price' => 'required|regex:/^[0-9]*\.?[0-9]{2}+$/'
        ]);

        return $this->ProductRepository->storeProductDetails($id, $validateData);
    }

    /**
     * Store a newly created resource in storage.
     *
     */

    public function storeImage()
    {
        $imageDirectory = 'public/images';

        if(!Storage::files($imageDirectory))
        {
            Storage::makeDirectory($imageDirectory);
        };
        return request()->image->store('images', 'public');

    }

    /**
     * Remove the specified resource from storage.
     *
     */

    public function deleteStoredImage($imageName) {

        $default = 'images/no_image.png';

        if($imageName != $default)
        {
            Storage::delete('public/' .$imageName);
        }

    }
}
