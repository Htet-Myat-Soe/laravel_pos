<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission as ModelsPermission;

class RoleAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // User Model

        $userPermission1 = Permission::create(['name' => 'create user']);
        $userPermission2 = Permission::create(['name' => 'read user']);

        // Role Model

        $rolePermission1 = Permission::create(['name' => 'create role']);
        $rolePermission2 = Permission::create(['name' => 'read role']);
        $rolePermission3 = Permission::create(['name' => 'update role']);
        $rolePermission4 = Permission::create(['name' => 'delete role']);

        // Permission Model

        $Permission1 = Permission::create(['name' => 'create']);
        $Permission2 = Permission::create(['name' => 'read']);
        $Permission3 = Permission::create(['name' => 'update']);
        $Permission4 = Permission::create(['name' => 'delete']);

        // Admin Model

        $adminPermission1 = Permission::create(['name' => 'read admin']);
        $adminPermission2 = Permission::create(['name' => 'update admin']);

        // Product Model

        $productPermission1 = Permission::create(['name' => 'create product']);
        $productPermission2 = Permission::create(['name' => 'read product']);
        $productPermission3 = Permission::create(['name' => 'update product']);
        $productPermission4 = Permission::create(['name' => 'delete product']);

        // Category Model

        $categoryPermission1 = Permission::create(['name' => 'create category']);
        $categoryPermission2 = Permission::create(['name' => 'read category']);
        $categoryPermission3 = Permission::create(['name' => 'update category']);
        $categoryPermission4 = Permission::create(['name' => 'delete category']);

        // brand Model

        $brandPermission1 = Permission::create(['name' => 'create brand']);
        $brandPermission2 = Permission::create(['name' => 'read brand']);
        $brandPermission3 = Permission::create(['name' => 'update brand']);
        $brandPermission4 = Permission::create(['name' => 'delete brand']);

        // Role

        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $moderatorRole = Role::create(['name' => 'moderator']);
        $deliverRole = Role::create(['name' => 'deliver']);
        $userRole = Role::create(['name' => 'user']);

        // Give Permission Role

        $superAdminRole->syncPermissions(ModelsPermission::all());
        $adminRole->syncPermissions(ModelsPermission::all());
        $moderatorRole->syncPermissions([
            $userPermission2,
            $rolePermission2,
            $Permission2,
            $productPermission2,
            $categoryPermission2,
            $brandPermission2,
            $adminPermission1,
        ]);
        $deliverRole->syncPermissions([
            $adminPermission1
        ]);

        $superAdmin = User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'super@admin.com',
            'phone' => '+959 793 148 428',
            'address' => 'Taungoo',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $admin = User::create([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@gmail.com',
            'phone' => '+959 455 688 767',
            'address' => 'Yangon',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $moderator = User::create([
            'name' => 'moderator',
            'is_admin' => 1,
            'email' => 'moderator@gmail.com',
            'phone' => '+959 777 322 500',
            'address' => 'Yangon',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $deliver = User::create([
            'name' => 'deliver',
            'is_admin' => 1,
            'email' => 'deliver@gmail.com',
            'phone' => '+959 404 344 211',
            'address' => 'Mandalay',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Give role to user

        $superAdmin->syncRoles($superAdminRole)->syncPermissions(ModelsPermission::all());
        $admin->syncRoles($adminRole)->syncPermissions(ModelsPermission::all());
        $moderator->syncRoles([$moderatorRole])->syncPermissions([
            $userPermission2,
            $rolePermission2,
            $Permission2,
            $productPermission2,
            $categoryPermission2,
            $brandPermission2,
            $adminPermission1,
        ]);
        $deliver->syncRoles([$deliverRole])->syncPermissions([
            $adminPermission1,
        ]);

    }
}
