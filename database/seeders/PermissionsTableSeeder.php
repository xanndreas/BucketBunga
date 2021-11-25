<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'product_access',
            ],
            [
                'id'    => 20,
                'title' => 'category_create',
            ],
            [
                'id'    => 21,
                'title' => 'category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'category_show',
            ],
            [
                'id'    => 23,
                'title' => 'category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'category_access',
            ],
            [
                'id'    => 25,
                'title' => 'color_create',
            ],
            [
                'id'    => 26,
                'title' => 'color_edit',
            ],
            [
                'id'    => 27,
                'title' => 'color_show',
            ],
            [
                'id'    => 28,
                'title' => 'color_delete',
            ],
            [
                'id'    => 29,
                'title' => 'color_access',
            ],
            [
                'id'    => 30,
                'title' => 'special_for_create',
            ],
            [
                'id'    => 31,
                'title' => 'special_for_edit',
            ],
            [
                'id'    => 32,
                'title' => 'special_for_show',
            ],
            [
                'id'    => 33,
                'title' => 'special_for_delete',
            ],
            [
                'id'    => 34,
                'title' => 'special_for_access',
            ],
            [
                'id'    => 35,
                'title' => 'location_create',
            ],
            [
                'id'    => 36,
                'title' => 'location_edit',
            ],
            [
                'id'    => 37,
                'title' => 'location_show',
            ],
            [
                'id'    => 38,
                'title' => 'location_delete',
            ],
            [
                'id'    => 39,
                'title' => 'location_access',
            ],
            [
                'id'    => 40,
                'title' => 'item_create',
            ],
            [
                'id'    => 41,
                'title' => 'item_edit',
            ],
            [
                'id'    => 42,
                'title' => 'item_show',
            ],
            [
                'id'    => 43,
                'title' => 'item_delete',
            ],
            [
                'id'    => 44,
                'title' => 'item_access',
            ],
            [
                'id'    => 45,
                'title' => 'cart_create',
            ],
            [
                'id'    => 46,
                'title' => 'cart_edit',
            ],
            [
                'id'    => 47,
                'title' => 'cart_show',
            ],
            [
                'id'    => 48,
                'title' => 'cart_delete',
            ],
            [
                'id'    => 49,
                'title' => 'cart_access',
            ],
            [
                'id'    => 50,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
