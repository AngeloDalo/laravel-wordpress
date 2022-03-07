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
        // $tags = Tag::all();
        // //ad ogni post posso mettere più tag
        // foreach ($tags as $tag) {
        //     //in questo modo un singolo tag verrà inserito solamente a 10 post
        //     //prendo i primi 10 posto randomicamente
        //     //e metto il tag con attach avendo una relazione
        //     $posts = Post::inRandomOrder()->limit(10)->get();
        //     $tag->posts()->attach($posts); 
        // }
        $posts = Post::all();
        //ad ogni tag piu di un post
        foreach ($posts as $post) {
            $tags = Tag::inRandomOrder()->limit(3)->get();
            $post->tags()->attach($tags);
        }
    }
}
