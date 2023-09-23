<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // user
            'user-show',
            'user-create',
            'user-update',
            'user-delete',

            // roles
            'role-show',
            'role-create',
            'role-update',
            'role-delete',

            // permissions
            'permission-show',
            'permission-create',
            'permission-update',
            'permission-delete',

            // access supper admin dashboard
            'admin-access',
        ];

        // create permissions
        // Admin permissions
        foreach ($permissions as $item) {
            Permission::create([
                'name' => $item,
                'guard_name' => 'web',
            ]);
        }

        // Merchant Permissions
        $merchant_permissions = [
            // user
            'user-show',
            'user-create',
            'user-update',
            'user-delete',
        ];

        // User Permission
        $customer_permissions = [
            'make_order',
        ];


        // Creating Roles
        $super_admin_role_id = Role::insertGetId(['name' => UserTypeEnum::SUPER_ADMIN->value, 'guard_name' => 'web']);
        $merchant_role_id    = Role::insertGetId(['name' => UserTypeEnum::MERCHANT->value, 'guard_name' => 'web']);
        $customer_role_id        = Role::insertGetId(['name' => UserTypeEnum::CUSTOMER->value, 'guard_name' => 'web']);

        // Assign permissions to roles

        // find permission ids
        $permissionIdsByName = fn ($_permissions) => Permission::whereIn('name', $_permissions)->pluck('id')->toArray();
        $roleHasPermission = DB::table('role_has_permissions');


        // super admin
        $roleHasPermission
            ->insert(
                collect($permissionIdsByName($permissions))->map(fn ($id) => [
                    'role_id' => $super_admin_role_id,
                    'permission_id' => $id,
                ])->toArray()
            );

        // merchant
        $roleHasPermission
            ->insert(
                collect($permissionIdsByName($merchant_permissions))->map(fn ($id) => [
                    'role_id' => $merchant_role_id,
                    'permission_id' => $id,
                ])->toArray()
            );

        // customer
        $roleHasPermission
            ->insert(
                collect($permissionIdsByName($customer_permissions))->map(fn ($id) => [
                    'role_id' => $customer_role_id,
                    'permission_id' => $id,
                ])->toArray()
            );

    }
}
