<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;


class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Products::factory()->count(10)->create();
    }
}
