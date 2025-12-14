<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Support\Str;

class AdditionalExclusiveSeeder extends Seeder
{
    public function run()
    {
        $shop = Shop::first();
        $category = Category::firstOrCreate(['name' => 'Premium Appliances', 'slug' => 'premium-appliances']);

        $products = [
            [
                'name' => 'Velvet Touch 4-Slice Toaster',
                'price' => 189.00,
                'image' => 'images/lifestyle-toaster.png', // Using the artifact image if available, else fallback
                'desc' => 'Perfectly browned toast, every time. The Velvet Touch brings luxury to your breakfast.'
            ],
            [
                'name' => 'Obsidian Stand Mixer',
                'price' => 459.00,
                'image' => 'images/black-copper-kettle.png', // Reusing black theme
                'desc' => 'Professional grade power with a stunning obsidian finish.'
            ],
            [
                'name' => 'Royal Espresso Machine',
                'price' => 699.00,
                'image' => 'images/silver-kettle.png', // Reusing silver theme
                'desc' => 'Barista quality coffee in the comfort of your home.'
            ],
            [
                'name' => 'Copper Air Fryer Pro',
                'price' => 229.00,
                'image' => 'images/red-kettle.png', // Using red/copper theme
                'desc' => 'Healthy cooking with a touch of elegance. Crispy texture, zero oil.'
            ],
            [
                'name' => 'Emerald Slow Juicer',
                'price' => 299.00,
                'image' => 'images/feature.png', // Green theme
                'desc' => 'Extract every drop of nutrition with our whisper-quiet slow juicer.'
            ],
            [
                'name' => 'Sapphire Blender',
                'price' => 199.00,
                'image' => 'images/blue-kettle.png', // Blue theme
                'desc' => 'Crush ice and blend smoothies in seconds with Sapphire blades.'
            ],
             [
                'name' => 'Gold Edition Rice Cooker',
                'price' => 159.00,
                'image' => 'images/yellow-kettle.png', // Gold/Yellow theme
                'desc' => 'Perfectly fluffy rice with a luxurious gold finish.'
            ],
        ];

        foreach ($products as $p) {
             Product::create([
                'shop_id' => $shop->id,
                'category_id' => $category->id,
                'name' => $p['name'],
                'slug' => Str::slug($p['name']) . '-' . Str::random(5), // Ensure unique slug
                'description' => $p['desc'],
                'short_description' => 'Member Exclusive',
                'price' => $p['price'],
                'stock' => 30,
                'image' => $p['image'],
                'status' => 'published',
                'is_exclusive' => true,
            ]);
        }
    }
}
