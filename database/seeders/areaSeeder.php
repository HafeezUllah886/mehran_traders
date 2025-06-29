<?php

namespace Database\Seeders;

use App\Models\areas;
use App\Models\warehouses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => "Area 1"],
        ];
        areas::insert($data);
    }
}
