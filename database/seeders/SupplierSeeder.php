<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            ['name' => 'TechWorld Distributors', 'email' => 'contact@techworld.com', 'phone' => '+1-202-555-0101', 'address' => '123 Silicon Ave', 'city' => 'San Francisco', 'country' => 'USA', 'status' => 'active'],
            ['name' => 'HomeLiving Supplies', 'email' => 'info@homeliving.com', 'phone' => '+1-202-555-0102', 'address' => '456 Comfort Blvd', 'city' => 'New York', 'country' => 'USA', 'status' => 'active'],
            ['name' => 'KitchenPro Wholesale', 'email' => 'sales@kitchenpro.com', 'phone' => '+44-20-7946-0103', 'address' => '789 Culinary St', 'city' => 'London', 'country' => 'UK', 'status' => 'active'],
            ['name' => 'FitGear International', 'email' => 'orders@fitgear.com', 'phone' => '+1-202-555-0104', 'address' => '321 Athletic Dr', 'city' => 'Chicago', 'country' => 'USA', 'status' => 'active'],
            ['name' => 'BookNest Publishers', 'email' => 'supply@booknest.com', 'phone' => '+44-20-7946-0105', 'address' => '654 Literary Lane', 'city' => 'Manchester', 'country' => 'UK', 'status' => 'active'],
            ['name' => 'FashionHub Traders', 'email' => 'trade@fashionhub.com', 'phone' => '+33-1-4000-0106', 'address' => '987 Style Avenue', 'city' => 'Paris', 'country' => 'France', 'status' => 'active'],
            ['name' => 'WellnessPlus Co.', 'email' => 'info@wellnessplus.com', 'phone' => '+1-202-555-0107', 'address' => '147 Health Rd', 'city' => 'Los Angeles', 'country' => 'USA', 'status' => 'active'],
            ['name' => 'OutdoorEdge Supplies', 'email' => 'contact@outdooredge.com', 'phone' => '+61-2-9000-0108', 'address' => '258 Nature Track', 'city' => 'Sydney', 'country' => 'Australia', 'status' => 'inactive'],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        $this->command->info(' suppliers seeded successfully!');
    }
}