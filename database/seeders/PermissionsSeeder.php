<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $createUser = Permission::create(['guard_name' => 'admin', 'name' => 'create user']);
        $deleteUser = Permission::create(['guard_name' => 'admin', 'name' => 'delete user']);
        $showUser = Permission::create(['guard_name' => 'admin', 'name' => 'show user']);

        $createTag = Permission::create(['guard_name' => 'admin', 'name' => 'create tag']);
        $deleteTag = Permission::create(['guard_name' => 'admin', 'name' => 'delete tag']);
        $editTag = Permission::create(['guard_name' => 'admin', 'name' => 'edit tag']);
        $showTag = Permission::create(['guard_name' => 'admin', 'name' => 'show tag']);

        $createCoupon = Permission::create(['guard_name' => 'admin', 'name' => 'create coupon']);
        $deleteCoupon = Permission::create(['guard_name' => 'admin', 'name' => 'delete coupon']);
        $editCoupon = Permission::create(['guard_name' => 'admin', 'name' => 'edit coupon']);
        $showCoupon = Permission::create(['guard_name' => 'admin', 'name' => 'show coupon']);

        $createProduct = Permission::create(['guard_name' => 'admin', 'name' => 'create product']);
        $deleteProduct = Permission::create(['guard_name' => 'admin', 'name' => 'delete product']);
        $editProduct = Permission::create(['guard_name' => 'admin', 'name' => 'edit product']);
        $showProduct = Permission::create(['guard_name' => 'admin', 'name' => 'show product']);

        $createProdAttr = Permission::create(['guard_name' => 'admin', 'name' => 'create productAttribute']);
        $deleteProdAttr = Permission::create(['guard_name' => 'admin', 'name' => 'delete productAttribute']);
        $editProdAttr = Permission::create(['guard_name' => 'admin', 'name' => 'edit productAttribute']);
        $showProdAttr = Permission::create(['guard_name' => 'admin', 'name' => 'show productAttribute']);
//
        $createCategory = Permission::create(['guard_name' => 'admin', 'name' => 'create category']);
        $deleteCategory = Permission::create(['guard_name' => 'admin', 'name' => 'delete category']);
        $editCategory = Permission::create(['guard_name' => 'admin', 'name' => 'edit category']);
        $showCategory = Permission::create(['guard_name' => 'admin', 'name' => 'show category']);
//
        $createAdmin = Permission::create(['guard_name' => 'admin', 'name' => 'create admin']);
        $deleteAdmin = Permission::create(['guard_name' => 'admin', 'name' => 'delete admin']);
        $editAdmin = Permission::create(['guard_name' => 'admin', 'name' => 'edit admin']);
        $showAdmin = Permission::create(['guard_name' => 'admin', 'name' => 'show admin']);
//
        $createRole = Permission::create(['guard_name' => 'admin', 'name' => 'create role']);
        $deleteRole = Permission::create(['guard_name' => 'admin', 'name' => 'delete role']);
        $editRole = Permission::create(['guard_name' => 'admin', 'name' => 'edit role']);
        $showRole = Permission::create(['guard_name' => 'admin', 'name' => 'show role']);


        $supervisor = Role::create(['guard_name' => 'admin', 'name' => 'supervisor']);
        $manager = Role::create(['guard_name' => 'admin', 'name' => 'manager']);

        $supervisor->givePermissionTo($showTag);
        $supervisor->givePermissionTo($editTag);
        $supervisor->givePermissionTo($createTag);
        $supervisor->givePermissionTo($deleteTag);

        $supervisor->givePermissionTo($showCoupon);
        $supervisor->givePermissionTo($deleteCoupon);
        $supervisor->givePermissionTo($createCoupon);
        $supervisor->givePermissionTo($editCoupon);

        $supervisor->givePermissionTo($showProduct);
        $supervisor->givePermissionTo($editProduct);
        $supervisor->givePermissionTo($createProduct);
        $supervisor->givePermissionTo($deleteProduct);

        $supervisor->givePermissionTo($createProdAttr);
        $supervisor->givePermissionTo($showProdAttr);
        $supervisor->givePermissionTo($editProdAttr);
        $supervisor->givePermissionTo($deleteProdAttr);

        $supervisor->givePermissionTo($createCategory);
        $supervisor->givePermissionTo($deleteCategory);
        $supervisor->givePermissionTo($editCategory);
        $supervisor->givePermissionTo($showCategory);

        $supervisor->givePermissionTo($createUser);
        $supervisor->givePermissionTo($deleteUser);
        $supervisor->givePermissionTo($showUser);

        $manager->givePermissionTo($showTag);
        $manager->givePermissionTo($editTag);
        $manager->givePermissionTo($createTag);
        $manager->givePermissionTo($deleteTag);

        $manager->givePermissionTo($showCoupon);
        $manager->givePermissionTo($deleteCoupon);
        $manager->givePermissionTo($createCoupon);
        $manager->givePermissionTo($editCoupon);

        $manager->givePermissionTo($showProduct);
        $manager->givePermissionTo($editProduct);
        $manager->givePermissionTo($createProduct);
        $manager->givePermissionTo($deleteProduct);

        $manager->givePermissionTo($createProdAttr);
        $manager->givePermissionTo($showProdAttr);
        $manager->givePermissionTo($editProdAttr);
        $manager->givePermissionTo($deleteProdAttr);

        $manager->givePermissionTo($createCategory);
        $manager->givePermissionTo($deleteCategory);
        $manager->givePermissionTo($editCategory);
        $manager->givePermissionTo($showCategory);

        $manager->givePermissionTo($createUser);
        $manager->givePermissionTo($deleteUser);
        $manager->givePermissionTo($showUser);

        $manager->givePermissionTo($createRole);
        $manager->givePermissionTo($deleteRole);
        $manager->givePermissionTo($editRole);
        $manager->givePermissionTo($showRole);

        $manager->givePermissionTo($createAdmin);
        $manager->givePermissionTo($deleteAdmin);
        $manager->givePermissionTo($editAdmin);
        $manager->givePermissionTo($showAdmin);


        $supervisorUser = Admin::create([
            'name' => 'supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        $supervisorUser->assignRole($supervisor);
        $admin = Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ]);
        $admin->assignRole($manager);


    }
}
