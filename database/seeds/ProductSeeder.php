<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Portatil Asus',
            'price' => 800,
            'file' => 'product_default.jpg'
        ]);

        Product::create([
            'name' => 'Teclado Gamer',
            'price' => 20,
            'file' => 'product_default.jpg'
        ]);

        Product::create([
            'name' => 'Mouse Inalambrico',
            'price' => 35,
            'file' => 'product_default.jpg'

        ]);
    }
}
