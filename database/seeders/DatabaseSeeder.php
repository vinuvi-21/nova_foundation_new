<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
    ]);

        $this->call(RolesTableSeeder::class);
        $this->call(userTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
         $this->call(SupplierSeeder::class);
        $this->call(ProducTSeeder::class);
        
        
    }
}
