<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

use App\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();

            //password uguale per tutti per esempio
            $string = '123_FC76';
            //funzione per criptare la password nel db
            $newUser->password = Hash::make($string);
            $newUser->save();
        }
    }
}
