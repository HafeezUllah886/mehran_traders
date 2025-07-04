<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $this->call(warehouseSeeder::class);
       $this->call(areaSeeder::class);
       $this->call(userSeeder::class);
       $this->call(units_seeder::class);
       $this->call(categorySeeder::class);
       $this->call(expenseCategorySeeder::class);
       $this->call(productsSeeder::class);
       $this->call(accountSeeder::class);
    }
}
