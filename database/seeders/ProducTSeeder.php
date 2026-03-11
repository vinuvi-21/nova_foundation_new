<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Electronics
            ['name' => 'Apple MacBook Pro 14"', 'category' => 'Electronics', 'description' => 'Powerful laptop with M3 Pro chip, 18GB RAM, 512GB SSD. Perfect for developers and designers.', 'price' => 1999.99, 'stock' => 45, 'rating' => 5],
            ['name' => 'Samsung 4K OLED TV 55"', 'category' => 'Electronics', 'description' => 'Stunning 4K OLED display with HDR support, smart TV features and built-in streaming apps.', 'price' => 1299.99, 'stock' => 30, 'rating' => 4],
            ['name' => 'Sony WH-1000XM5 Headphones', 'category' => 'Electronics', 'description' => 'Industry-leading noise cancelling wireless headphones with 30-hour battery life.', 'price' => 349.99, 'stock' => 80, 'rating' => 5],
            ['name' => 'iPad Air 10.9"', 'category' => 'Electronics', 'description' => 'Thin and light iPad with M1 chip, 64GB storage, Wi-Fi 6 support and all-day battery.', 'price' => 599.99, 'stock' => 60, 'rating' => 4],
            ['name' => 'Logitech MX Master 3 Mouse', 'category' => 'Electronics', 'description' => 'Advanced wireless mouse with ultra-fast scrolling, ergonomic design and multi-device support.', 'price' => 99.99, 'stock' => 120, 'rating' => 5],
            ['name' => 'Dell UltraSharp 27" Monitor', 'category' => 'Electronics', 'description' => '4K USB-C monitor with 99% sRGB color accuracy, ideal for creative professionals.', 'price' => 749.99, 'stock' => 35, 'rating' => 4],
            ['name' => 'Canon EOS R50 Camera', 'category' => 'Electronics', 'description' => 'Mirrorless camera with 24.2MP sensor, 4K video recording and Wi-Fi connectivity.', 'price' => 679.99, 'stock' => 25, 'rating' => 4],
            ['name' => 'Anker 65W USB-C Charger', 'category' => 'Electronics', 'description' => 'Compact fast charger with 3 ports supporting MacBook, iPhone and Android devices simultaneously.', 'price' => 45.99, 'stock' => 200, 'rating' => 4],

            // Furniture
            ['name' => 'Ergonomic Office Chair', 'category' => 'Furniture', 'description' => 'Lumbar support office chair with adjustable armrests, breathable mesh back and 5-year warranty.', 'price' => 389.99, 'stock' => 50, 'rating' => 5],
            ['name' => 'Standing Desk 60"x24"', 'category' => 'Furniture', 'description' => 'Electric height-adjustable standing desk with memory presets, solid bamboo top and cable management.', 'price' => 549.99, 'stock' => 20, 'rating' => 4],
            ['name' => 'Bookshelf 5-Tier Wooden', 'category' => 'Furniture', 'description' => 'Rustic solid wood bookshelf with metal frame, holds up to 200lbs per shelf.', 'price' => 189.99, 'stock' => 40, 'rating' => 4],
            ['name' => 'Memory Foam Mattress Queen', 'category' => 'Furniture', 'description' => 'CertiPUR-US certified 12-inch memory foam mattress with cooling gel layer and 10-year warranty.', 'price' => 699.99, 'stock' => 15, 'rating' => 5],
            ['name' => 'L-Shaped Sofa', 'category' => 'Furniture', 'description' => 'Modern sectional sofa with reversible chaise, stain-resistant fabric and solid wood legs.', 'price' => 1099.99, 'stock' => 10, 'rating' => 4],

            // Kitchen
            ['name' => 'Nespresso Vertuo Next Coffee Machine', 'category' => 'Kitchen', 'description' => 'Smart coffee machine with one-touch brewing, 5 cup sizes and WiFi connectivity.', 'price' => 179.99, 'stock' => 75, 'rating' => 5],
            ['name' => 'KitchenAid Stand Mixer 5Qt', 'category' => 'Kitchen', 'description' => 'Professional stand mixer with 10 speeds, stainless steel bowl and includes 3 attachments.', 'price' => 449.99, 'stock' => 30, 'rating' => 5],
            ['name' => 'Instant Pot Duo 7-in-1', 'category' => 'Kitchen', 'description' => 'Multi-use pressure cooker, slow cooker, rice cooker, steamer, sauté pan and food warmer in one.', 'price' => 89.99, 'stock' => 90, 'rating' => 4],
            ['name' => 'Vitamix Blender E310', 'category' => 'Kitchen', 'description' => 'Professional-grade blender with 10 variable speeds, self-cleaning and 48oz container.', 'price' => 349.99, 'stock' => 40, 'rating' => 5],
            ['name' => 'Non-Stick Cookware Set 10pc', 'category' => 'Kitchen', 'description' => 'Granite coated non-stick pots and pans set, oven safe up to 500°F, dishwasher safe.', 'price' => 129.99, 'stock' => 55, 'rating' => 4],
            ['name' => 'Digital Kitchen Scale', 'category' => 'Kitchen', 'description' => 'Precision food scale with 0.1g accuracy, tare function and LCD display. Capacity 11lbs.', 'price' => 24.99, 'stock' => 150, 'rating' => 4],

            // Sports & Fitness
            ['name' => 'Yoga Mat Premium 6mm', 'category' => 'Sports & Fitness', 'description' => 'Eco-friendly non-slip yoga mat with alignment lines, carrying strap and extra thick cushioning.', 'price' => 49.99, 'stock' => 100, 'rating' => 4],
            ['name' => 'Adjustable Dumbbell Set 5-52lbs', 'category' => 'Sports & Fitness', 'description' => 'Space-saving adjustable dumbbells replacing 15 sets of weights with quick-change dial system.', 'price' => 349.99, 'stock' => 25, 'rating' => 5],
            ['name' => 'Treadmill FoldAway Pro', 'category' => 'Sports & Fitness', 'description' => 'Foldable treadmill with 12 incline levels, built-in speakers, tablet holder and 3.0 CHP motor.', 'price' => 799.99, 'stock' => 12, 'rating' => 4],
            ['name' => 'Resistance Bands Set', 'category' => 'Sports & Fitness', 'description' => 'Set of 5 resistance bands with handles, door anchor and ankle straps. Suitable for all fitness levels.', 'price' => 29.99, 'stock' => 180, 'rating' => 4],
            ['name' => 'Garmin Forerunner 255 Watch', 'category' => 'Sports & Fitness', 'description' => 'GPS running smartwatch with heart rate monitor, sleep tracking and up to 14-day battery life.', 'price' => 349.99, 'stock' => 45, 'rating' => 5],

            // Books & Stationery
            ['name' => 'The Clean Coder - Robert Martin', 'category' => 'Books & Stationery', 'description' => 'A code of conduct for professional programmers covering estimation, pressure and collaboration.', 'price' => 34.99, 'stock' => 200, 'rating' => 5],
            ['name' => 'Atomic Habits - James Clear', 'category' => 'Books & Stationery', 'description' => 'Practical guide to building good habits and breaking bad ones using proven scientific methods.', 'price' => 19.99, 'stock' => 250, 'rating' => 5],
            ['name' => 'Leuchtturm1917 Notebook A5', 'category' => 'Books & Stationery', 'description' => 'Hardcover dot grid notebook with 251 numbered pages, table of contents and ribbon bookmark.', 'price' => 24.99, 'stock' => 120, 'rating' => 4],
            ['name' => 'Pilot G2 Gel Pens 12-Pack', 'category' => 'Books & Stationery', 'description' => 'Smooth writing retractable gel pens with comfortable grip, water resistant and fade proof ink.', 'price' => 14.99, 'stock' => 300, 'rating' => 4],

            // Clothing & Accessories
            ['name' => 'Levi\'s 511 Slim Jeans', 'category' => 'Clothing & Accessories', 'description' => 'Classic slim fit jeans in stretch denim, sits below waist with slim through hip and thigh.', 'price' => 69.99, 'stock' => 85, 'rating' => 4],
            ['name' => 'Nike Air Max 270 Sneakers', 'category' => 'Clothing & Accessories', 'description' => 'Lifestyle shoes with large Air unit for all-day comfort, breathable mesh upper and rubber outsole.', 'price' => 149.99, 'stock' => 60, 'rating' => 4],
            ['name' => 'Leather Bifold Wallet', 'category' => 'Clothing & Accessories', 'description' => 'Genuine full-grain leather wallet with 6 card slots, ID window and RFID blocking protection.', 'price' => 39.99, 'stock' => 130, 'rating' => 4],
            ['name' => 'Casio G-Shock Watch GA-2100', 'category' => 'Clothing & Accessories', 'description' => 'Shock resistant analog-digital watch with world time, stopwatch and 200m water resistance.', 'price' => 99.99, 'stock' => 70, 'rating' => 5],

            // Health & Beauty
            ['name' => 'Philips Sonicare Toothbrush', 'category' => 'Health & Beauty', 'description' => 'Electric toothbrush with 3 modes, pressure sensor, 2-minute timer and 2-week battery life.', 'price' => 89.99, 'stock' => 65, 'rating' => 5],
            ['name' => 'Dyson Supersonic Hair Dryer', 'category' => 'Health & Beauty', 'description' => 'Fast drying hair dryer with intelligent heat control, magnetic attachments and 3 speed settings.', 'price' => 429.99, 'stock' => 30, 'rating' => 5],
            ['name' => 'CeraVe Moisturising Cream 16oz', 'category' => 'Health & Beauty', 'description' => 'Fragrance-free moisturizer with hyaluronic acid and ceramides for dry to very dry skin.', 'price' => 18.99, 'stock' => 220, 'rating' => 4],
            ['name' => 'Foam Roller 36"', 'category' => 'Health & Beauty', 'description' => 'High-density foam roller for muscle recovery, deep tissue massage and myofascial release.', 'price' => 34.99, 'stock' => 95, 'rating' => 4],

            // Outdoor & Garden
            ['name' => 'Coleman 6-Person Tent', 'category' => 'Outdoor & Garden', 'description' => 'Weatherproof camping tent with WeatherTec system, room divider and sets up in 10 minutes.', 'price' => 199.99, 'stock' => 22, 'rating' => 4],
            ['name' => 'Weber Spirit II Gas Grill', 'category' => 'Outdoor & Garden', 'description' => '3-burner propane grill with iGrill compatibility, porcelain-enameled grates and side tables.', 'price' => 549.99, 'stock' => 18, 'rating' => 5],
            ['name' => 'Fiskars Garden Tool Set', 'category' => 'Outdoor & Garden', 'description' => 'Ergonomic 3-piece garden set including trowel, transplanter and cultivator with soft-grip handles.', 'price' => 29.99, 'stock' => 110, 'rating' => 4],
            ['name' => 'Solar Garden Lights 12-Pack', 'category' => 'Outdoor & Garden', 'description' => 'Waterproof LED solar pathway lights with auto on/off dusk-to-dawn sensor and 8-hour runtime.', 'price' => 39.99, 'stock' => 160, 'rating' => 4],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('product seeded successfully!');
    }
}
