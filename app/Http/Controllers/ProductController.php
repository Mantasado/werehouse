<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->productService->getAllProductTypes();
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
        $this->productService->createProduct($validateData);
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
        $product = $this->productService->findProductById($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productService->findProductById($id);
        $types = $this->productService->getAllProductTypes();
        return view('product.edit', compact('product', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $validateData = $this->requestValidation($request);
        $this->productService->updateProduct($id, $validateData);
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
        $this->productService->deleteProduct($id);
        return redirect('/');
    }

    public function removedProducts()
    {
        $products = $this->productService->getRemovedProducts();
        return view('product.removed', compact('products'));
    }

    public function restore($id)
    {
        $this->productService->restoreRemovedProduct($id);
        return redirect('/removed');
    }

    public function forceDelete($id)
    {
        $this->productService->forceDeleteProduct($id);
        return redirect('/removed');
    }

    public function getAll()
    {
        return $this->productService->getAllProducts();
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

}
