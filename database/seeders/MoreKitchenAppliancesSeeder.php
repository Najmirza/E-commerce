<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class MoreKitchenAppliancesSeeder extends Seeder
{
    public function run()
    {
        $shop = Shop::first();
        // Create a new category for these professional grade items
        $category = Category::firstOrCreate(['name' => 'Pro Kitchen Series', 'slug' => 'pro-kitchen-series']);

        $products = [
            // Coffee & Tea
            ['name' => 'Precision Drip Coffee Maker', 'price' => 189.00, 'image' => 'images/black-copper-kettle.png', 'desc' => 'Wake up to the perfect cup. Programmable timer and thermal carafe.'],
            ['name' => 'Electric Gooseneck Kettle', 'price' => 79.00, 'image' => 'images/feature.png', 'desc' => 'Variable temperature control for the ultimate pour-over experience.'],
            ['name' => 'Compact Espresso Machine', 'price' => 399.00, 'image' => 'images/silver-kettle.png', 'desc' => 'Barista-quality espresso in a footprint that fits any kitchen.'],

            // Preparation
            ['name' => 'High-Performance Blender', 'price' => 299.00, 'image' => 'images/black-copper-kettle.png', 'desc' => 'Crush ice, blend smoothies, and make hot soups with ease.'],
            ['name' => 'Food Processor Elite', 'price' => 199.00, 'image' => 'images/cream-kettle.png', 'desc' => 'Chop, slice, shred, and knead dough. The ultimate kitchen assistant.'],
            ['name' => 'Hand Immersion Blender', 'price' => 59.00, 'image' => 'images/silver-kettle.png', 'desc' => 'Blend directly in the pot. Perfect for soups and sauces.'],
            ['name' => 'Electric Coffee Grinder', 'price' => 49.00, 'image' => 'images/black-copper-kettle.png', 'desc' => 'Freshly ground beans for superior flavor. adjustable grind settings.'],

            // Cooking
            ['name' => '4-Slice Smart Toaster', 'price' => 89.00, 'image' => 'images/red-kettle.png', 'desc' => 'Touchscreen display and countdown timer. Perfect toast every time.'],
            ['name' => 'Electric Indoor Grill', 'price' => 129.00, 'image' => 'images/black-copper-kettle.png', 'desc' => 'Grill your favorites year-round with virtually no smoke.'],
            ['name' => 'Slow Cooker w/ Sous Vide', 'price' => 149.00, 'image' => 'images/cream-kettle.png', 'desc' => 'Tender, flavor-packed meals with set-it-and-forget-it convenience.'],
            ['name' => 'Digital Rice Cooker', 'price' => 99.00, 'image' => 'images/white-kettle.png', 'desc' => 'Perfectly fluffy rice, quinoa, and grains at the touch of a button.'],
            ['name' => 'Air Fryer Toaster Oven', 'price' => 219.00, 'image' => 'images/silver-kettle.png', 'desc' => 'Fry, bake, broil, and toast in one versatile appliance.'],
            
            // Baking & Specialty
            ['name' => 'Stand Mixer Architect', 'price' => 429.00, 'image' => 'images/blue-kettle.png', 'desc' => 'Iconic design meets powerful performance for all your baking needs.'],
            ['name' => 'Bread Maker Deluxe', 'price' => 139.00, 'image' => 'images/cream-kettle.png', 'desc' => 'Fresh homemade bread without the hassle. Gluten-free settings included.'],
            ['name' => 'Electric Ice Cream Maker', 'price' => 69.00, 'image' => 'images/yellow-kettle.png', 'desc' => 'Delicious homemade ice cream and sorbet in just 20 minutes.']
        ];

        foreach ($products as $p) {
            Product::create([
                'shop_id' => $shop->id,
                'category_id' => $category->id,
                'name' => $p['name'],
                'slug' => Str::slug($p['name']) . '-' . Str::random(5), // Ensure uniqueness
                'description' => $p['desc'],
                'short_description' => 'Professional Series',
                'price' => $p['price'],
                'stock' => 50,
                'image' => $p['image'],
                'status' => 'published',
                'is_exclusive' => true, // Make them exclusive to populate the slider
            ]);
        }
    }
}
