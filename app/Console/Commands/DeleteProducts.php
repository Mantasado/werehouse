<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use App\Services\ProductService;
class DeleteProducts extends Command
{
    private $productServices;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes products that are soft deleted and are older than 7days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        $this->productServices = $productService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::now()->subDays(7);
        $products = $this->productServices->getRemovedProducts()->where('created_at', '>', $date);
        foreach($products as $product)
        {
            $this->productServices->forceDeleteProduct($product->id);
        }
        return 0;
    }
}
