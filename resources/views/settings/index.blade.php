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

        <form method="post"  action="{{route('settings.update')}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="blog_name">blog name</label>
                <input type="text" value="{{$settings->blog_name}}" name="blog_name" class="form-control" id="blog_name" >
            </div>
            <div class="form-group">
                <label for="blog_email">blog email</label>
                <input type="text" value="{{$settings->blog_email}}" name="blog_email" class="form-control" id="blog_email" >
            </div>
            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" value="{{$settings->phone}}" name="phone" class="form-control" id="phone" >
            </div>
            <div class="form-group">
                <label for="address">address</label>
                <input type="text" value="{{$settings->address}}" name="address" class="form-control" id="address" >
            </div>





            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
