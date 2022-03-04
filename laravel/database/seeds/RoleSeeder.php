<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRoles = [
            'admin',
            'editor'
        ];

        foreach ($arrayRoles as $role) {
            $newRole = new Role();
            $newRole->name = $role;
            $newRole->save();
        }
    }
}
