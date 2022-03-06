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
        //chiamarli in ordine di creazione per non creare errori errori
        $this->call(UserSeeder::class);
        $this->call(UserInfoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostTagSeeder::class);
    }
}
