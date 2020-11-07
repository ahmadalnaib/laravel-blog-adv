@extends('layouts.app')


@section('content')
    <div class="container">
        {{--        show errors--}}
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif

        <form method="post"  action="{{route('category.store')}}" >
            @csrf
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="name" >
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
