@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Tag</th>
                <th scope="col">edit</th>
                <th scope="col">Delete</th>

            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->tag}}</td>
                    <td>
                        <a class="btn-link" href="{{route('tags.edit',$tag->id)}}">Edit</a>
                    </td>
                    <td>
                        <a class="btn-link" href="{{route('tags.delete',$tag->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
