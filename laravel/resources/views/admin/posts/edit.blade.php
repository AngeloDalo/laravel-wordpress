@extends('layouts.admin')

@section('content')
<div class="row">
  @if (session('status'))
      <div class="alert alert-danger">
          {{ session('status') }}
      </div>
  @endif
</div>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase">Modifica Post: {{ $post->title }}</h2>
                <a class="btn btn-primary" href="{{route('admin.posts.index')}}">HOME</a>
                <a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">VIEW</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.posts.update', $post->slug) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        <label for="eyelet" class="form-label text-uppercase fw-bold">Eyelet</label>
                        <input type="text" class="form-control" id="eyelet" name="eyelet" value="{{ $post->eyelet }}">
                        @error('eyelet')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
              
                      </div>
                      <div class="mb-3">
                        <label for="title" class="form-label text-uppercase fw-bold">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                      </div>
                      @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
              
                      <div class="mb-3">
                          <label for="content" class="form-label text-uppercase fw-bold">content</label>
                          <textarea type="text-area" class="form-control" id="content" name="content" row="5">{{ $post->content }}</textarea>
                      </div>
                      @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
              
                      <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection