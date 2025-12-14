<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Support\Str;

class ExclusiveProductSeeder extends Seeder
{
    public function run()
    {
        // Ensure we have a shop and category to attach to
        $shop = Shop::first();
        if (!$shop) {
             // Fallback if no shop exists
             $shop = Shop::create([
                 'user_id' => 1, // Assumes user 1 exists
                 'name' => 'Kettle HQ',
                 'slug' => 'kettle-hq',
                 'status' => 'active'
             ]);
        }
        
        $category = Category::first();
        if (!$category) {
            $category = Category::create(['name' => 'Premium', 'slug' => 'premium']);
        }

        $exclusiveProducts = [
            ['name' => 'Diamond Series Kettle', 'price' => 299.00, 'color' => 'Silver'],
            ['name' => 'Obsidian Elite', 'price' => 349.00, 'color' => 'Black'],
            ['name' => 'Royal Gold Edition', 'price' => 499.00, 'color' => 'Gold'],
            ['name' => 'Sapphire Smart Brew', 'price' => 259.00, 'color' => 'Blue'],
            ['name' => 'Emerald Vintage', 'price' => 279.00, 'color' => 'Green'],
            ['name' => 'Titanium Pro', 'price' => 399.00, 'color' => 'Grey'],
            ['name' => 'Rose Gold Artisan', 'price' => 329.00, 'color' => 'Rose'],
            ['name' => 'Marble Touch Limited', 'price' => 289.00, 'color' => 'White'],
            ['name' => 'Copper Masterpiece', 'price' => 319.00, 'color' => 'Copper'],
            ['name' => 'Platinum Precise', 'price' => 449.00, 'color' => 'Silver'],
        ];

        foreach ($exclusiveProducts as $item) {
            // Use existing images randomly for now
            $images = [
                'images/feature.png', 
                'images/silver-kettle.png', 
                'images/white-kettle.png', 
                'images/cream-kettle.png', 
                'images/yellow-kettle.png',
                'images/black-copper-kettle.png'
            ];
            
            Product::create([
                'shop_id' => $shop->id,
                'category_id' => $category->id,
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => 'Exclusive member-only edition. Precision engineering meets luxury design.',
                'short_description' => 'Member Exclusive',
                'price' => $item['price'],
                'stock' => 50,
                'image' => $images[array_rand($images)],
                'status' => 'published',
                'is_exclusive' => true,
            ]);
        }
    }
}
