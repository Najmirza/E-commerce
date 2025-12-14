<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Vendor
        $vendor = User::create([
            'name' => 'Kettle Vendor',
            'email' => 'vendor@kettle.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'vendor',
        ]);

        // 2. Create Shop
        $shop = Shop::create([
            'user_id' => $vendor->id,
            'name' => 'Kettle Official',
            'slug' => 'kettle-official',
            'description' => 'The official store for premium Kettle appliances.',
            'status' => 'active',
        ]);

        // 3. Create Categories
        $vintage = Category::create(['name' => 'Vintage Collection', 'slug' => 'vintage-collection']);
        $modern = Category::create(['name' => 'Modern Collection', 'slug' => 'modern-collection']);
        $summer = Category::create(['name' => 'Summer Collection', 'slug' => 'summer-collection']);
        $bold = Category::create(['name' => 'Bold Collection', 'slug' => 'bold-collection']);
        $premium = Category::create(['name' => 'Premium Collection', 'slug' => 'premium-collection']);
        $minimalist = Category::create(['name' => 'Minimalist Collection', 'slug' => 'minimalist-collection']);

        // 4. Create Products
        $products = [
            [
                'name' => 'Sage Green Retro',
                'slug' => 'sage-green-retro',
                'category_id' => $vintage->id,
                'price' => 129.00,
                'image' => 'images/feature.png',
                'description' => 'A timeless classic. This Sage Green Retro kettle combines 1950s aesthetic with modern fast-boil technology.',
            ],
            [
                'name' => 'Baby Blue Classic',
                'slug' => 'baby-blue-classic',
                'category_id' => $modern->id,
                'price' => 149.00,
                'image' => 'images/blue-kettle.png',
                'description' => 'Soft pastel blue finish that brings a sense of calm to your morning routine. Stainless steel interior.',
            ],
            [
                'name' => 'Sunshine Yellow',
                'slug' => 'sunshine-yellow',
                'category_id' => $summer->id,
                'price' => 119.00,
                'image' => 'images/yellow-kettle.png',
                'description' => 'Brighten up your kitchen with our Sunshine Yellow kettle. Compact, powerful, and cheerful.',
            ],
            [
                'name' => 'Cherry Red',
                'slug' => 'cherry-red',
                'category_id' => $bold->id,
                'price' => 139.00,
                'image' => 'images/red-kettle.png',
                'description' => 'Make a statement. The Cherry Red kettle is for those who live boldly. Rapid boil system included.',
            ],
            [
                'name' => 'Matte Black',
                'slug' => 'matte-black',
                'category_id' => $premium->id,
                'price' => 159.00,
                'image' => 'images/black-copper-kettle.png',
                'description' => 'Sophisticated and sleek. Matte black finish with real copper accents. The ultimate luxury appliance.',
            ],
            [
                'name' => 'Pearl White',
                'slug' => 'pearl-white',
                'category_id' => $minimalist->id,
                'price' => 129.00,
                'image' => 'images/white-kettle.png',
                'description' => 'Pure and simple. The Pearl White edition fits seamlessly into any decor style from Scandi to Industrial.',
            ],
            [
                'name' => 'Classic Cream',
                'slug' => 'classic-cream',
                'category_id' => $vintage->id,
                'price' => 139.00,
                'image' => 'images/cream-kettle.png',
                'description' => 'A warm, inviting cream finish that feels like home. Durable enamel coating.',
            ],
            [
                'name' => 'Modern Silver',
                'slug' => 'modern-silver',
                'category_id' => $modern->id,
                'price' => 149.00,
                'image' => 'images/silver-kettle.png',
                'description' => 'Brushed stainless steel perfection. The professional choice for home baristas.',
            ]
        ];

        foreach ($products as $p) {
            Product::create([
                'shop_id' => $shop->id,
                'category_id' => $p['category_id'],
                'name' => $p['name'],
                'slug' => $p['slug'],
                'price' => $p['price'],
                'image' => $p['image'],
                'description' => $p['description'],
                'status' => 'published',
                'stock' => 50,
            ]);
        }
    }
}
