<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Roles List','Role Create','Role Edit','Role Delete',
            'Users List','User Create','User Edit','User Delete',
            'Blacklist List', 'Blacklist Create', 'Blacklist Unblock',
            'Drivers List', 'Driver Create', 'Driver Edit', 'Driver Delete','Driver Unblock',
            'Gate 1 Trips List', 'Gate 1 Trips Active',
            'Gate 2 Trips In - List', 'Gate 2 Trips Out - List', 'Gate 2 Trips Checkin', 'Gate 2 Trips Checkout',
            'Gate 3 Trips In - List', 'Gate 3 Trips Out - List', 'Gate 3 Trips Checkin', 'Gate 3 Trips Checkout',
            'Gate 4 Trips Out - List', 'Gate 4 Trips Checkout',
            'Logs List', 'Log Create', 'Log Edit', 'Log Delete',
            'Trips List', 'Trip Create', 'Trip Edit', 'Trip Delete',
            'Management Section', 'Gate 1 Section', 'Gate 2 Section', 'Gate 3 Section','Gate 4 Section',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
