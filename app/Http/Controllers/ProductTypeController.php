<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductTypeRepositoryInterface;

class ProductTypeController extends Controller
{
    protected $productTypeRepository;

    public function __construct(ProductTypeRepositoryInterface $productTypeRepository)
    {
        $this->productTypeRepository = $productTypeRepository;
    }

    public function index()
    {
        return $this->productTypeRepository->getAll();

    }
}
