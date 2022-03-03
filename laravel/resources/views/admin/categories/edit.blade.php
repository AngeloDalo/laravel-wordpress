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
                  <h2 class="text-uppercase">Modifica Categoria: {{ $category->name }}</h2>
                  <a class="btn btn-primary mt-5" href="{{url()->previous()}}">CANCEL</a>
              </div>
          </div>
          <div class="row">
              <div class="col">
                  <form action="{{ route('admin.categories.update', $category->slug) }}" method="post">
                      @csrf
                      @method('PATCH')
                      <div class="mb-3 mt-3">

                          <label for="name" class="form-label text-uppercase fw-bold">name</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                          @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                
                        <button type="submit" class="btn btn-primary">Save</button>
                  </form>
              </div>
          </div>
      </div>
@endsection