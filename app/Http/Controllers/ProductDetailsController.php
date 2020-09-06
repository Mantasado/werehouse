<?php

namespace App\Http\Controllers;

use App\ProductDetails;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $this->productService->createProductDetails($id, $request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductDetails  $productDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetails $productDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDetails  $productDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetails $productDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductDetails  $productDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetails $productDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDetails  $productDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetails $productDetails)
    {
        //
    }
}
