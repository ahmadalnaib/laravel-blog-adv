@extends('layouts.app')


@section('content')
    <h1>delete Posts</h1>
    <div class="container grid-my">

        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <img src="{{$post->photo}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
                    <a href="{{route('posts.restore',$post->id)}}" class="btn btn-primary">Restore</a>
                    <a href="{{route('posts.hdelete',$post->id)}}" class="btn btn-danger"> Hard Delete</a>
                </div>
            </div>
        @endforeach
    </div>


@endsection
