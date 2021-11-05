<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SetupRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'create user', 'read user', 'update user', 'delete user',
            'create customer', 'read customer', 'update customer', 'delete customer',
            'create company', 'read company', 'update company', 'delete company',
            'create coupon', 'read coupon', 'update coupon', 'delete coupon',
            'create order', 'read order', 'update order', 'delete order'
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        // role and permission for admin
        $adminRole = Role::findOrCreate(User::ROLE_ADMIN);
        $adminRole->givePermissionTo(Permission::all());

        // role and permission for partner
        $partnerRole = Role::create(['name' => 'partner']);
        $partnerRole->givePermissionTo([
            'read user',
            'update user',
            'read order',
            'update order',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
