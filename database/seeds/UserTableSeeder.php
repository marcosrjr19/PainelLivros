    <?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_viewer = Role::where("name", "viewer")->first();
        $role_manager  = Role::where("name", "manager")->first();

        $employee = new User();
        $employee->name = "Marcos Visualizador";
        $employee->email = "visualizador@example.com";
        $employee->password = bcrypt("secret");
        $employee->save();
        $employee->roles()->attach($role_viewer);


        $manager = new User();
        $manager->name = "Marcos Manager";
        $manager->email = "manager@example.com";
        $manager->password = bcrypt("secret");
        $manager->save();
        $manager->roles()->attach($role_manager);
        //
    }
}
