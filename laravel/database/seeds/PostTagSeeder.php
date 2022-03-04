<?php

use Illuminate\Database\Seeder;
use App\Model\Post;
use App\Model\Tag;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();
        //ad ogni post posso mettere più tag
        foreach ($tags as $tag) {
            //in questo modo un singolo tag verrà inserito solamente a 6 post
            $posts = Post::inRandomOrder()->limit(10)->get();
            $tag->posts()->attach($posts); 
        }
    }
}
