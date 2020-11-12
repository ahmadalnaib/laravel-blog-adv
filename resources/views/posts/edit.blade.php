@extends('layouts.app')


@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        {{--        show errors--}}
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <form method="post"  action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title"  value="{{$post->title}}">
            </div>

            <label for="tag">Tags</label>
            <div class="form-check p-2 ">

                @foreach($tags as $tag)
                    <label class="form-check-label " for="tag">
                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}" id="tag"


                        @foreach($post->tags as $ta)
                        @if($tag->id == $ta->id)
                            checked
                            @endif
                        @endforeach>
                        {{$tag->tag}}
                    </label><br>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">
                    {{$post->content}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">

                    @foreach($categorises as $category)
                        @if($category->id == $post->category_id)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Upload photo</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
