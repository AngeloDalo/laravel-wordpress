<?php

use Faker\Generator as Faker;
use App\User;
use App\Model\UserInfo; 
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        //essendo una 1 to 1 ciclo in base al numero di utenti
        foreach ($users as $user) {
            $newUserInfo = new UserInfo();
            $newUserInfo->phone = $faker->phoneNumber();
            $newUserInfo->address = $faker->address();
            $newUserInfo->user_id = $user->id;
            $newUserInfo->save();
        }
    }
}
