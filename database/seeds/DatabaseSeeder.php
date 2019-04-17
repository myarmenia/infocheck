<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // pull role-sider before users
        $this->call(RolesTableSeeder::class);
        // user-sider use the role above
        $this->call(UsersTableSeeder::class);
    }
}
