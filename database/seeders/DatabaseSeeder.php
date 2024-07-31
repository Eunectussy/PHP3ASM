<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // UsersSeeder::class,
            // CategorySeeder::class,
            ProductsSeeder::class,
            ProductCommentSeeder::class,

        ]);
    }
}
