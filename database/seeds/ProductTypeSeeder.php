<?php

use Illuminate\Database\Seeder;
use App\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'vegtables'
            ],
            [
                'name' => 'fruits'
            ],
            [
                'name' => 'meat'
            ],
            [
                'name' => 'fish'
            ],
            [
                'name' => 'drinks'
            ]
        ];

        foreach($types as $type)
        {
            ProductType::create($type);
        }
    }
}
