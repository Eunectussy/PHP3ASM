<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //querry builder
use Illuminate\Support\Facades\Hash; //thêm thư viện hash
use App\Models\Users;
class UsersSeeder extends Seeder
{
    public function run(): void
    {
        Users::factory()->count(15)->create();
    }
}
