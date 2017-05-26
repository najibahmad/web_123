<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        $admin = new Role();
        $admin->name = 'Admin';
        $admin->save();

        $manager = new Role();
        $manager->name = 'Manager';
        $manager->save();

        $collector = new Role();
        $collector->name = 'Collector';
        $collector->save();

        $analyst = new Role();
        $analyst->name = 'Analyst';
        $analyst->save();

        $create_user = new Permission();
        $create_user->name = 'can_create_user';
        $create_user->display_name = 'Can Create Users';
        $create_user->save();
        /* ... */
        $admin->attachPermission($create_user);
        /* ... */
        $user1 = App\User::find(1);
        //$user = User::where('username', '=', 'george')->first();

        $user1->attachRole($admin);
    }
}
