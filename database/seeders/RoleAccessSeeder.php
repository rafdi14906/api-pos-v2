<?php

namespace Database\Seeders;

use App\Models\RoleAccess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleAccess::truncate();

        DB::table('role_accesses')->insert([
            [
                'role_id' => 1,
                'menu_id' => 1,
                'parent_sub_menu_id' => 1,
                'child_sub_menu_id' => null,
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
                'print' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 1,
                'menu_id' => 2,
                'parent_sub_menu_id' => 2,
                'child_sub_menu_id' => null,
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
                'print' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 1,
                'menu_id' => 3,
                'parent_sub_menu_id' => 3,
                'child_sub_menu_id' => null,
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
                'print' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 1,
                'menu_id' => 3,
                'parent_sub_menu_id' => 4,
                'child_sub_menu_id' => null,
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => true,
                'print' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 2,
                'parent_sub_menu_id' => 2,
                'child_sub_menu_id' => null,
                'create' => true,
                'read' => true,
                'update' => true,
                'delete' => false,
                'print' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
