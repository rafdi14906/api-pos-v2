<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::truncate();

        DB::table('menus')->insert([
            [
                'name' => 'Purchase Order',
                'path' => '#',
                'icon' => 'fa-solid fa-industry',
                'order_number' => '1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sales',
                'path' => '#',
                'icon' => 'fa-solid fa-cash-register',
                'order_number' => '1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Settings',
                'path' => '#',
                'icon' => 'fa-solid fa-gears',
                'order_number' => '1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
