<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductTypeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    private $productRepository;
    private $productTypeRepository;

    public function __construct(ProductRepositoryInterface $productRepository, ProductTypeRepositoryInterface $productTypeRepository)
    {
        $this->productRepository = $productRepository;
        $this->productTypeRepository = $productTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getAll()->paginate(10);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->productTypeRepository->getAll();
        
        return view('product.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->requestValidation($request);

        if($request->has('image'))
        {
            $validateData['image'] = $this->storeImage();
        }
        
        $this->productRepository->create($validateData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->getById($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = $this->productTypeRepository->getAll();
        return view('product.edit', compact('product', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $this->requestValidation($request);

        if($request->has('image'))
        {
            $this->deleteStoredImage($product->image);
            $validateData['image'] = $this->storeImage();
        }

        $this->productRepository->update($product->id, $validateData);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return redirect('/');
    }

    public function removedProducts()
    {
        $products = $this->productRepository->getRemoved();

        return view('product.removed', compact('products'));
    }

    public function restore($id)
    {
        $this->productRepository->findRemoved($id)->restore();

        return redirect('/removed');
    }

    public function forceDelete($id)
    {
        $findRemovedProduct = $this->productRepository->findRemoved($id);

        $this->deleteStoredImage($findRemovedProduct->image);
        $this->productRepository->forceDelete($id);

        return redirect('/removed');
    }

    public function storeImage()
    {
        $imageDirectory = 'public/images';

        if(request()->has('image'))
        {
            if(!Storage::files($imageDirectory))
            {
               Storage::makeDirectory($imageDirectory);
            };
            return request()->image->store('images', 'public');
        }
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

    public function deleteStoredImage($imageName) {

        $default = 'images/no_image.png';

        if($imageName != $default)
        {
            Storage::delete('public/' .$imageName);
        }

    }
}
