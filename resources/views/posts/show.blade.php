@extends('layouts.app')

@section('content')


    <div class="jumbotron">
        <img src="{{$post->photo}}" alt="">
        <h1 class="display-4">{{$post->title}}</h1>
        <p class="lead">{{$post->content}}</p>
        <hr class="my-4">
       <small>{{$post->created_at->diffForHumans()}}</small>

    </div>

@endsection
