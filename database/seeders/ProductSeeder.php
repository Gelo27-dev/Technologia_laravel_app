<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some categories
        $gamingLaptop = Category::where('name', 'Gaming Laptops')->first();
        $businessLaptop = Category::where('name', 'Business Laptops')->first();
        $graphicsCard = Category::where('name', 'Graphics Cards')->first();
        $monitor = Category::where('name', 'Monitors')->first();

        // Sample products
        Product::create([
            'name' => 'ASUS ROG Strix G15',
            'description' => 'High-performance gaming laptop with RTX 4070 graphics',
            'price' => 1499.99,
            'stock' => 10,
            'category_id' => $gamingLaptop->id,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Dell XPS 13',
            'description' => 'Ultra-portable business laptop with 12th gen Intel processor',
            'price' => 1299.99,
            'stock' => 15,
            'category_id' => $businessLaptop->id,
            'image' => null,
        ]);

        Product::create([
            'name' => 'NVIDIA RTX 4080',
            'description' => 'Latest generation graphics card for gaming and content creation',
            'price' => 1199.99,
            'stock' => 5,
            'category_id' => $graphicsCard->id,
            'image' => null,
        ]);

        Product::create([
            'name' => 'Samsung 32" 4K Monitor',
            'description' => 'Ultra HD monitor with excellent color accuracy',
            'price' => 499.99,
            'stock' => 20,
            'category_id' => $monitor->id,
            'image' => null,
        ]);

        Product::create([
            'name' => 'MacBook Pro 16"',
            'description' => 'Professional laptop for developers and creatives',
            'price' => 2499.99,
            'stock' => 8,
            'category_id' => $businessLaptop->id,
            'image' => null,
        ]);

        Product::create([
            'name' => 'AMD Ryzen 9 7950X',
            'description' => 'High-end processor for gaming and workstation builds',
            'price' => 699.99,
            'stock' => 12,
            'category_id' => Category::where('name', 'Processors')->first()->id,
            'image' => null,
        ]);
    }
}