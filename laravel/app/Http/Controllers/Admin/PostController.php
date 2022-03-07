<?php

namespace App\Http\Controllers\Admin;
use App\Model\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prophecy\Call\Call;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles()->get()->contains('1')) {
            // order posts and paginate
            $posts = Post::orderBy('created_at', 'desc')->paginate(20);
        } else {
            $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);
        }
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser()
    {
        //vedere solamente i post miei, quindi che corrisponda l'Auth e passarli ad una index diversa
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //controllo se l'utente è loggato
        $data['user_id'] = Auth::user()->id;


        $validateData = $request->validate([
            'eyelet' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'exists:App\Model\Category,id', //controlla se la categoria è presente in Category
            'tags.*' => 'nullable|exists:App\Model\Tag,id', //controlla tutti i tag e se c'è stata una manipolazione esterna
            'image' => 'nullable|image'
        ]);

        if (!empty($data['image'])) {
            $img_path = Storage::put('uploads', $data['image']);
            $data['image'] = $img_path;
        }

        $post = new Post();
        $post->fill($data);
        $post->slug = $post->createSlug($data['title']);
        $post->save();

        if (!empty($data['tags'])) {
            $post->tags()->attach($data['tags']);  //non essendo obbligatori i tags andremo ad inserirli solo se presenti
        }

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //controllo se il post che andiamo a modificare è dell'utente
        if (Auth::user()->id != $post->user_id && !Auth::user()->roles()->get()->contains(1)) {
            abort('403');
        }
        //bisognerà passare i dati precompilati
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        //vedere se post che andiamo a modificare è dell'utente
        if (Auth::user()->id != $post->user_id) {
            abort('403');
        }

        $validateData = $request->validate([
            'eyelet' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'exists:App\Model\Category,id',
            'tags.*' => 'nullable|exists:App\Model\Tag,id',
            'image' => 'nullable|image'
        ]);

        //controlli se il dato è statp modificato
        if ($data['eyelet'] != $post->eyelet) {
            $post->eyelet = $data['eyelet'];
        }

        if ($data['title'] != $post->title) {
            $post->title = $data['title'];
            //slug solamente nel titolo
            $post->slug = $post->createSlug($data['title']);
        }
        if ($data['content'] != $post->content) {
            $post->content = $data['content'];
        }
        if ($data['category_id'] != $post->category_id) {
            $post->category_id = $data['category_id'];
        }
        if (!empty($data['image'])) {
            Storage::delete($post->image);

            $img_path = Storage::put('uploads', $data['image']);
            $post->image = $img_path;
        }
        
        $post->update($data);

        if (!empty($data['tags'])) {
            $post->tags()->sync($data['tags']); //se il campo tags non è vuoto elimina i tags non più presenti e mette quelli nuovi
        } else {
            $post->tags()->detach(); //se non ci sono tags (posso averli tolti nell'edit) elimino tutti i tags dal post
        }

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //non posso cancellare file che non sono miei
        if (Auth::user()->id !== $post->user_id) {
            abort('403');
        }

        $post->tags()->detach(); //rimuovere collegamento *to*
        $post->delete();
        //il with serve per il messaggio
        return redirect()->route('admin.posts.index')->with('status', "Post id $post->id deleted");
    }
}
