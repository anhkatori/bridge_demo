<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as Per;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // tạo permission
        Per::create([
            'name' => 'access-staff_list',
            'display_name' => 'access-staff_list'
        ]);
        Per::create([
            'name' => 'access-ot_cost',
            'display_name' => 'access-ot_cost'
        ]);
        Per::create([
            'name' => 'access-administrative_cost',
            'display_name' => 'access-administrative_cost'
        ]);
        Per::create([
            'name' => 'access-outsource_cost',
            'display_name' => 'access-outsource_cost'

        ]);
        Per::create([
            'name' => 'access-deployment_cost',
            'display_name' => 'access-deployment_cost'

        ]);
        Per::create([
            'name' => 'access-dashboard',
            'display_name' => 'access-dashboard'

        ]);
        Per::create([
            'name' => 'access-project',
            'display_name' => 'access-project'

        ]);
        Per::create([
            'name' => 'access-resource_allocation',
            'display_name' => 'access-resource_allocation'
        ]);
        Per::create([
            'name' => 'access-user_list',
            'display_name' => 'access-user_list'

        ]);
        Per::create([
            'name' => 'access-decentralization',
            'display_name' => 'access-decentralization'

        ]);
        Per::create([
            'name' => 'add-staff_list',
            'display_name' => 'add-staff_list'

        ]);
        Per::create([
            'name' => 'add-ot_cost',
            'display_name' => 'add-ot_cost'

        ]);
        Per::create([
            'name' => 'add-administrative_cost',
            'display_name' => 'add-administrative_cost'

        ]);
        Per::create([
            'name' => 'add-outsource_cost',
            'display_name' => 'add-outsource_cost'

        ]);
        Per::create([
            'name' => 'add-deployment_cost',
            'display_name' => 'add-deployment_cost'

        ]);
        Per::create([
            'name' => 'add-dashboard',
            'display_name' => 'add-dashboard'

        ]);
        Per::create([
            'name' => 'add-project',
            'display_name' => 'add-project'

        ]);
        Per::create([
            'name' => 'add-resource_allocation',
            'display_name' => 'add-resource_allocation'
        ]);
        Per::create([
            'name' => 'add-user_list',
            'display_name' => 'add-user_list'

        ]);
        Per::create([
            'name' => 'add-decentralization',
            'display_name' => 'add-decentralization'

        ]);
        Per::create([
            'name' => 'edit-staff_list',
            'display_name' => 'edit-staff_list'

        ]);
        Per::create([
            'name' => 'edit-ot_cost',
            'display_name' => 'edit-ot_cost'

        ]);
        Per::create([
            'name' => 'edit-administrative_cost',
            'display_name' => 'edit-administrative_cost'

        ]);
        Per::create([
            'name' => 'edit-outsource_cost',
            'display_name' => 'edit-outsource_cost'

        ]);
        Per::create([
            'name' => 'edit-deployment_cost',
            'display_name' => 'edit-deployment_cost'

        ]);
        Per::create([
            'name' => 'edit-dashboard',
            'display_name' => 'edit-dashboard'

        ]);
        Per::create([
            'name' => 'edit-project',
            'display_name' => 'edit-project'

        ]);
        Per::create([
            'name' => 'edit-resource_allocation',
            'display_name' => 'edit-resource_allocation'
        ]);
        Per::create([
            'name' => 'edit-user_list',
            'display_name' => 'edit-user_list'

        ]);
        Per::create([
            'name' => 'edit-decentralization',
            'display_name' => 'edit-decentralization'

        ]);
        Per::create([
            'name' => 'delete-staff_list',
            'display_name' => 'delete-staff_list'

        ]);
        Per::create([
            'name' => 'delete-ot_cost',
            'display_name' => 'delete-ot_cost'

        ]);
        Per::create([
            'name' => 'delete-administrative_cost',
            'display_name' => 'delete-administrative_cost'

        ]);
        Per::create([
            'name' => 'delete-outsource_cost',
            'display_name' => 'delete-outsource_cost'

        ]);
        Per::create([
            'name' => 'delete-deployment_cost',
            'display_name' => 'delete-deployment_cost'

        ]);
        Per::create([
            'name' => 'delete-dashboard',
            'display_name' => 'delete-dashboard'

        ]);
        Per::create([
            'name' => 'delete-project',
            'display_name' => 'delete-project'

        ]);
        Per::create([
            'name' => 'delete-resource_allocation',
            'display_name' => 'delete-resource_allocation'
        ]);
        Per::create([
            'name' => 'delete-user_list',
            'display_name' => 'delete-user_list'

        ]);
        Per::create([
            'name' => 'delete-decentralization',
            'display_name' => 'delete-decentralization'

        ]);

        // tạo role
        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin'
        ]);
        Role::create([
            'name' => 'pm',
            'display_name' => 'PM'
        ]);
        Role::create([
            'name' => 'hr',
            'display_name' => 'HR/AD'
        ]);
        Role::create([
            'name' => 'bod',
            'display_name' => 'BOD'
        ]);
        Role::create([
            'name' => 'sales',
            'display_name' => 'Sales'
        ]);

        //role-has-permission:
        $admin = Role::find(1);
        $admin->givePermissionTo(Per::all());
        // $permissions_admin = [Per::find(1), Per::find(2), Per::find(3), Per::find(4), Per::find(5), Per::find(6), Per::find(7), Per::find(8)];
        // $admin->syncPermissions($permissions_admin);

        // seeder role cho user:
        $user = User::find(1);
        $user->assignRole('admin');
        $user = User::find(3);
        $user->assignRole('pm');
        $user = User::find(4);
        $user->assignRole('hr');
        $user = User::find(5);
        $user->assignRole('bod');
        $user = User::find(6);
        $user->assignRole('sales');
    }
}
