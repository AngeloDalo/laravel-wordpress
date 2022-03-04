<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all(); //tutti gli utenti
        $roles = Role::all(); //tutti i ruoli
        foreach ($users as $user) { //tutti gli user
            $roleRandom = Role::inRandomOrder()->first()->id; //ruolo random 
            $user->roles()->attach($roleRandom); //inserisco il ruolo random nell'user
            //una stessa persona può avere 2 ruoli randomicamente
            foreach ($roles as $role) { //per ognuno dei ruoli
                $rand = random_int(0, 1); //genera un numero a caso
                if ((bool) $rand) { //se abbiamo true
                    if ($roleRandom !== $role->id) {
                        $user->roles()->attach($role->id); // inseriamo questo ruolo
                    }
                }
            }
        }
    }
}

