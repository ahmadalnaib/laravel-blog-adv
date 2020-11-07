
@extends('layouts.app')


@section('content')
    <div class="container">
        {{--        show errors--}}

        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <form method="post"  action="{{route('category.update',$category->id)}}" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
