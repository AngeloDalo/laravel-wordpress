@extends('layouts.admin')

@section('content')
<div class="container show p-5">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col">
            @if ($post->category_id !== null)
                <h3>Category: {{ $post->category()->first()->name }} </h2>
            @endif
             <h2>{{ $post->eyelet }}</h2>
             <h1>{{ $post->title }}</h1>
             <span>{{ $post->content }}</span>
        </div>
    </div>
    <div class="col">
        <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
    </div>
    <a class="btn btn-primary mt-5" href="{{url()->previous()}}">CANCEL</a>
    <a class="btn btn-primary mt-5" href="{{ route('admin.posts.index') }}">HOME</a>
</div>
@endsection