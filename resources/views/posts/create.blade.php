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

        <form method="post"  action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" >
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">

                    @foreach($categorises as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
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
