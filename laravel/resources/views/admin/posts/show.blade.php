@extends('layouts.app')

@section('content')
<div class="container show p-5">
    <div class="row">
        <div class="col">
             <h2>{{ $post->eyelet }}</h2>
             <h1>{{ $post->title }}</h1>
             <span>{{ $post->content }}</span>
        </div>
    </div>
    <a class="btn btn-primary mt-5" href="{{url()->previous()}}">CANCEL</a>
    <a class="btn btn-primary mt-5" href="{{ route('admin.posts.index') }}">HOME</a>
</div>
@endsection