

@extends('layouts.app')


@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('tags.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" name="tag" class="form-control" id="tag" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @endsection
