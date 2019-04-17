<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'employee';
        $role_employee->description = 'An employee user';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'A manager user';
        $role_manager->save();

        $role_iuser = new Role();
        $role_iuser->name = 'i_user';
        $role_iuser->description = 'A simple user';
        $role_iuser->save();

        $role_iadmin = new Role();
        $role_iadmin->name = 'i_admin';
        $role_iadmin->description = 'An administrator';
        $role_iadmin->save();
    }
}
