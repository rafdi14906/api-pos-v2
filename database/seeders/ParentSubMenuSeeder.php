<?php

namespace Database\Seeders;

use App\Models\ParentSubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParentSubMenu::truncate();

        DB::table('parent_sub_menus')->insert([
            [
                'menu_id' => 1,
                'name' => 'Order',
                'path' => '/purchase-order/order',
                'icon' => '',
                'order_number' => '1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 2,
                'name' => 'Order',
                'path' => '/sales-order/order',
                'icon' => '',
                'order_number' => '1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 3,
                'name' => 'User',
                'path' => '/settings/user',
                'icon' => '',
                'order_number' => '1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_id' => 3,
                'name' => 'Role',
                'path' => '/settings/role',
                'icon' => '',
                'order_number' => '2',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
