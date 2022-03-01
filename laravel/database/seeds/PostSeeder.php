<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Model\Post;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newPost = new Post();
            $newPost->eyelet = $faker->sentence(3, true);
            $newPost->title = $faker->sentence(3, true);
            $newPost->content = $faker->paragraphs(5, true);
            
            $title = "$newPost->title-$i";
            $newPost->slug = Str::slug($title, '-');
            $newPost->user_id = User::inRandomOrder()->first()->id;
            $newPost->save();
        }
    }
}
