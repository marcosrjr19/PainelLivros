<?php

use Illuminate\Database\Seeder;
use RoleTableSeeder;
use UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        $this->call(RoleTableSeeder::class);

        $this->call(UserTableSeeder::class);
    }
}
