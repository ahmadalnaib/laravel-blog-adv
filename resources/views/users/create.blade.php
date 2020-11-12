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




            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
