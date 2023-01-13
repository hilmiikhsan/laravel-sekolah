<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create data user
        $userCreate = User::create([
            'name'     => 'Muhammad Ikhsan Hilmi',
            'email'    => 'robbinhood22012@gmail.com',
            'password' => bcrypt('passwordAdmin')
        ]);

        // assign permission to role
        $role = Role::find(1);
        $permissions = Permission::all();

        $role->syncPermissions($permissions);

        // assign role with permission to user
        $user = User::find(1);
        $user->assignRole($role->name);
    }
}
