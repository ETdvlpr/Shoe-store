<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Facades\File;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/productList.json");
        $productList = json_decode($json);
        foreach($productList as $product) {
            Product::create([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'currency' => $product->currency,
                'image' => $product->image,
            ]);
        }
    }
}
