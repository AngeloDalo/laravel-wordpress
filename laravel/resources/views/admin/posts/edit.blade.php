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
                <form action="{{ route('admin.posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 mt-3">
                        <select class="form-select" name="category_id">
                          <option value="">Select a category</option>
                            @foreach ($categories as $category)
                              <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                              {{ $category->name }} - {{ $category->id }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                          <div class="alert alert-danger mt-3">
                            {{ $message }}
                          </div>
                        @enderror

                        @error('tags.*')
                        <div class="alert alert-danger mt-3">
                            {{ $message }}
                        </div>
                        @enderror
                        <fieldset class="mb-3">
                            <legend>Tags</legend>
                            {{-- se abbiamo compilato il post ma poi si presenta un errore bisognerà ricompilare le checkbox precedentemente selezionate --}}
                            @if ($errors->any())
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                            @else
                            {{-- se non sono presenti errori prendiamo le checkbox dal database --}}
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                        {{ $post->tags()->get()->contains($tag->id)? 'checked': '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                      </fieldset>
                        
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

                      @if (!empty($post->image))
                      <div class="mb-3">
                          <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}"
                              alt="{{ $post->title }}">
                      </div>
                      @endif
                      <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        @error('image')
                            <div class="alert alert-danger mt-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
              
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection