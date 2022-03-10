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

    public function search(Request $request)
    {
        $data = $request->all();


        //aperta chiamata ma non chiusa per avere continui aggiornamenti
        $posts = Post::where('id', '>=', 1);

        //se abbiamo orderbycolumn e orderbysort in $data
        //li usiamo per ordinare
        //se esistono parametri allona andrò a fare il mio ordinamento
        if (array_key_exists('orderbycolumn', $data) && array_key_exists('orderbysort', $data)) {
            $posts->orderBy($data['orderbycolumn'], $data['orderbysort']);
        }

        //Se esistono i tags all'interno di data passati tramite request
        if (array_key_exists('tags', $data)) {
            foreach ($data['tags'] as $tag) {
                //whereHas fa una join
                //fa una join per controllare i tag che sono associati al product
                $posts->whereHas('tags', function (Builder $query) use ($tag) {
                    $query->where('name', '=', $tag);
                });
            }
        }

        $posts = $posts->with(['tags', 'category'])->get();

        return response()->json([
            'response' => true,
            'count' =>  $posts->count(),
            'results' =>  [
                'data' => $posts
            ],
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json([
            'response' => true,
            'count' => $post ? 1 : 0,
            'results' =>  [
                'data' => $post
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
    //     $posts = Post::orderBy($data['orderby'], $data['order'])->get();

    //     return response()->json([
    //         'response' => true,
    //         'results' =>  $post,
    //     ]);
    // }
}
