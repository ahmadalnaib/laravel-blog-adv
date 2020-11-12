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

        <form method="post"  action="{{route('users.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" >
            </div>

            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control" name="about" id="about" cols="30" rows="10"></textarea>
            </div>

                <div class="form-group">
                    <label for="avatar">Upload avatar</label>
                    <input type="file" class="form-control-file" id="avatar" name="avatar">
                </div>

            <div class="form-group">
                <label for="facebook">Facebook link</label>
                <input type="text" name="facebook" class="form-control" id="facebbok" >
            </div>

            <div class="form-group">
                <label for="twitter">Twitter link</label>
                <input type="text" name="twitter" class="form-control" id="twitter" >
            </div>

            <div class="form-group">
                <label for="linkedin">linkedin link</label>
                <input type="text" name="linkedin" class="form-control" id="linkedin" >
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
