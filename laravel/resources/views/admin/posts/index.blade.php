@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row row-title-index">
        <h1 class="h1 text-uppercase">Admin - All Posts</h1>
    </div>
    <!--message delate-->
    {{-- <div class="row">
        <div class="col">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div> --}}
    <div class="row">
        <div class="col">
             <table class="table table-primary">
                <thead>
                    <tr class="table-primary">
                        <th>Title</th>
                        <th>Eyelet</th>
                        <th>View</th>
                        {{-- <th>Update</th>
                        <th>Delate</th> --}}
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->eyelet }}</td>
                        <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">View</a></td>
                        {{-- <td><a class="btn btn-primary" href="{{ route('posts.edit', $post) }}">Update</a></td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
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