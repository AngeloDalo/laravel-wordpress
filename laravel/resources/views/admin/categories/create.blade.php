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
      <form action="{{ route('admin.categories.store') }}" method="post">
        <a class="btn btn-primary" href="{{url()->previous()}}">CANCEL</a>
        @csrf
        @method('POST')
        <div class="mb-3 mt-3">
          <label for="name" class="form-label text-uppercase fw-bold">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
</div>
@endsection