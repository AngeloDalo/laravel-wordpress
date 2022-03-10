<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Model\Post;

class PostController extends Controller
{
    //mette nella pagine iniziale tutti i post presi tramite Post:: dobbiamo far ritornare alla pagina che gestisce il la homepage un file json
    public function index()
    {
        //metto nella varibile Post tutti i post 
        $posts = Post::orderBy('created_at', 'desc')->paginate(8);

        //creo un file json 
        return response()->json([
            'response' => true,
            'results' =>  $posts,
        ]);
    }

    public function inRandomOrder()
    {
        $posts = Post::inRandomOrder()->limit(8)->get();
        return response()->json([
            'response' => true,
            'results' =>  [
                'data' => $posts
            ],
        ]);
    }

    // public function show($id) 
    // {
    //     $post = Post::find($id);
    //     if (empty($post)) {
    //         $post = [];
    //     }
    //     return response()->json([
    //         'response' => true,
    //         'results' =>  $post,
    //     ]);
    // }

    // public function orderBy(Request $request)
    // {
    //     $data = $request->all();
    //     dd($data['orderby']);
    //     $products = Post::orderBy($data['orderby'], $data['order'])->get();

    //     return response()->json([
    //         'response' => true,
    //         'results' =>  $post,
    //     ]);
    // }
}
