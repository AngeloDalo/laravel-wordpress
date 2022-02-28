@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row">
      <form action="{{ route('admin.posts.store') }}" method="post">
        <a class="btn btn-primary" href="{{url()->previous()}}">CANCEL</a>
        @csrf
        @method('POST')
        <div class="mb-3 mt-3">
          <label for="eyelet" class="form-label text-uppercase fw-bold">Eyelet</label>
          <input type="text" class="form-control" id="eyelet" name="eyelet">
          @error('eyelet')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>
        <div class="mb-3">
          <label for="title" class="form-label text-uppercase fw-bold">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="content" class="form-label text-uppercase fw-bold">content</label>
            <input type="text" class="form-control" id="content" name="content">
        </div>
        @error('content')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
</div>
@endsection