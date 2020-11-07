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
                <th scope="col">Categories</th>
                <th scope="col">edit</th>
                <th scope="col">Delete</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categorises as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <a class="btn-link" href="{{route('category.edit',$category->id)}}">Edit</a>
                </td>
                <td>
                    <a class="btn-link" href="{{route('category.delete',$category->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
