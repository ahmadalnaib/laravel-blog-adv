@extends('layouts.app')


@section('content')
    <div class="container">

        <form method="post"  action="{{route('posts.store')}}>
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" >
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <form>
                <div class="form-group">
                    <label for="photo">Upload photo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
            </form>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
