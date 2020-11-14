@extends('layouts.app')


@section('content')
    <main class="showcase">
        <h1>JobPlatform</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, reiciendis.</p>
    </main>
    <section class="category">

        @foreach($categories as $categoy)
            <li><a href="#">{{$categoy->name}}</a></li>
        @endforeach

    </section>

   <div class="container p-3 m-3">
    <div class="blogs">
        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                <img src="{{$post->photo}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>

                </div>
            </div>

        @endforeach
    </div>
   </div>

@endsection
