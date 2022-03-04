@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="row row-title-index">
        <h1 class="h1 text-uppercase">Admin - All Posts</h1>
    </div>
    <!--message delate-->
     <div class="row">
        <div class="col">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div> 
    <div class="row">
        <div class="col">
             <table class="table table-primary">
                <thead>
                    <tr class="table-primary">
                        <th>Title</th>
                        <th>Eyelet</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Updated at</th>
                        <th>View</th>
                        <th>Update</th>
                        <th>Delate</th>
                    </tr>
                </thead>
                <tbody>
                @if (Auth::user()->roles()->get()->contains('1')) {{--se utente è admin posso cancellare modificare o vedere i post--}}
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->eyelet }}</td>
                            @if ($post->category_id !== null)
                            <td>{{ $post->category()->first()->name }}</td>
                            @else
                            <td>No Category</td>
                            @endif
                            <td>
                                @if ($post->tags()->get()->count() === 0)
                                    No tags
                                @endif
                                @foreach ($post->tags()->get() as $tag)
                                    {{ $tag->name }}
                                @endforeach
                            </td>
                            <td>{{ $post->updated_at }}</td>
                            <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">View</a></td>
                            <td>
                                {{-- @if (Auth::user()->id === $post->user_id) --}}
                                    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}">Update</a>
                                {{-- @endif --}}
                            </td>
                            <td>
                                {{-- @if (Auth::user()->id === $post->user_id) --}}
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                {{-- @endif --}}
                            </td>
                        </tr>
                    @endforeach
                @else
                {{--altrimenti posso modificare solamente i miei post eventuali post non miei se non sono admin non li posso vedere--}}
                    @foreach (Auth::user()->posts()->get() as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category_id }}</td>
                            <td>
                                @foreach ($post->tags()->get() as $tag)
                                    {{ $tag->name }}
                                @endforeach
                            </td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">View</a></td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.posts.edit', $post->slug) }}">Modify</a></td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection