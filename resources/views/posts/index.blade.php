@extends('layouts.app')


@section('content')
    <div class="container grid-my">
      @if($posts->count() >0 )
      @foreach($posts as $post)
        <div class="card" style="width: 18rem;">
            <img src="{{$post->photo}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('posts.delete',$post->id)}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        @endforeach

        @else
          <p>ops no posts..😥</p>
          @endif
    </div>


@endsection
