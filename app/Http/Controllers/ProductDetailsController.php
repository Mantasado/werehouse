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

}
