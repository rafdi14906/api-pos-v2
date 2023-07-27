<?php

namespace Database\Seeders;

use App\Models\ChildSubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChildSubMenu::truncate();

        DB::table('child_sub_menus')->insert([
            [
                'parent_sub_menu_id' => 1,
                'name' => 'Test Order',
                'path' => '/purchase-order/order/test',
                'icon' => '',
                'order_number' => '1',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
