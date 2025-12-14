<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Support\Str;

class HighDensityApplianceSeeder extends Seeder
{
    public function run()
    {
        $shop = Shop::first();
        $category = Category::firstOrCreate(['name' => 'Premium Appliances', 'slug' => 'premium-appliances']);

        // Variety of high-end appliances to look good in 5-column layout
        $products = [
            ['name' => 'Barista Pro Grinder', 'price' => 249.00, 'image' => 'images/black-copper-kettle.png', 'desc' => 'Precision grinding for the perfect espresso shot.'],
            ['name' => 'Sous Vide Precision', 'price' => 199.00, 'image' => 'images/silver-kettle.png', 'desc' => 'Restaurant quality cooking at home.'],
            ['name' => 'Aeroccino Frother', 'price' => 89.00, 'image' => 'images/cream-kettle.png', 'desc' => 'Velvety milk foam in seconds.'],
            ['name' => 'Digital Air Fryer XL', 'price' => 179.00, 'image' => 'images/black-copper-kettle.png', 'desc' => 'Crispy, healthy, delicious.'],
            ['name' => 'Smart Multi-Cooker', 'price' => 299.00, 'image' => 'images/silver-kettle.png', 'desc' => 'Pressure cook, slow cook, steam, and sautÃ©.'],
            ['name' => 'Retro Stand Mixer', 'price' => 349.00, 'image' => 'images/red-kettle.png', 'desc' => 'The centerpiece of any baker\'s kitchen.'],
            ['name' => 'Cold Press Juicer', 'price' => 229.00, 'image' => 'images/feature.png', 'desc' => 'Maximum nutrient extraction.'],
            ['name' => 'Panini Press Deluxe', 'price' => 129.00, 'image' => 'images/silver-kettle.png', 'desc' => 'CafÃ© style sandwiches at home.'],
            ['name' => 'Waffle Maker Pro', 'price' => 99.00, 'image' => 'images/black-copper-kettle.png', 'desc' => 'Golden, fluffy waffles every morning.'],
            ['name' => 'Gelato Maker', 'price' => 259.00, 'image' => 'images/cream-kettle.png', 'desc' => 'Authentic Italian gelato in 30 minutes.']
        ];

        foreach ($products as $p) {
             Product::create([
                'shop_id' => $shop->id,
                'category_id' => $category->id,
                'name' => $p['name'],
                'slug' => Str::slug($p['name']) . '-' . Str::random(5),
                'description' => $p['desc'],
                'short_description' => 'Member Exclusive',
                'price' => $p['price'],
                'stock' => 25,
                'image' => $p['image'],
                'status' => 'published',
                'is_exclusive' => true,
            ]);
        }
    }
}
