@extends('layouts.admin')

@section('content')
<div class="container p-5">
  <div class="row">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
  </div>
    <div class="row">
      <form action="{{ route('admin.posts.store') }}" method="post">
        <a class="btn btn-primary" href="{{url()->previous()}}">CANCEL</a>
        @csrf
        @method('POST')
        <div class="mb-3 mt-3">
          <select class="form-select" name="category_id">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                    {{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id')
             <div class="alert alert-danger mt-3">
                {{ $message }}
             </div>
          @enderror

          @error('tags.*')  {{-- tutti i tipi di tags --}}
          <div class="alert alert-danger mt-3">
              {{ $message }}
          </div>
          @enderror
          <fieldset class="mb-3">
              <legend>Tags</legend>
              @foreach ($tags as $tag)
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                      {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} {{-- non perde valore se c'è errore --}}
                      >
                  <label class="form-check-label" for="flexCheckDefault">
                      {{ $tag->name }}
                  </label>
              </div>
              @endforeach
          </fieldset>

          <label for="eyelet" class="form-label text-uppercase fw-bold">Eyelet</label>
          <input type="text" class="form-control" id="eyelet" name="eyelet" value="{{ old('eyelet') }}">
          @error('eyelet')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="mb-3">
          <label for="title" class="form-label text-uppercase fw-bold">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="content" class="form-label text-uppercase fw-bold">content</label>
            <input type="text" class="form-control" id="content" name="content" value="{{ old('content') }}">
        </div>
        @error('content')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
</div>
@endsection