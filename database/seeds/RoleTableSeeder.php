<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_employee = new Role();
        $role_employee->name = "viewer";
        $role_employee->description = "A viewer User";
        $role_employee->save();
        
        $role_manager = new Role();
        $role_manager->name = "manager";
        $role_manager->description = "A Manager User";
        $role_manager->save();
    }
}
