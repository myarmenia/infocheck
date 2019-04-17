<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'employee')->first();
        $role_manager = Role::where('name', 'manager')->first();
        $role_iuser = Role::where('name','i_user')->first();
        $role_iadmin = Role::where('name', 'i_admin')->first();

        $employee = new User();
        $employee->name = 'Employee Name';
        $employee->email = 'employee@mail.ru';
        $employee->password = bcrypt('secret');
        $employee->save();
        $employee->roles()->attach($role_employee);

        $manager = new User();
        $manager->name = 'Manager Name';
        $manager->email = 'manager@mail.ru';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($role_manager);

        $iuser = new User();
        $iuser->name = 'User Name';
        $iuser->email = 'user@mail.ru';
        $iuser->password = bcrypt('secret');
        $iuser->save();
        $iuser->roles()->attach($role_iuser);

        $iadmin = new User();
        $iadmin->name = 'Admin Name';
        $iadmin->email = 'admin@mail.ru';
        $iadmin->password = bcrypt('secret');
        $iadmin->save();
        $iadmin->roles()->attach($role_iadmin);

    }
}
