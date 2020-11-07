@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Categories</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorises as $category)
            <tr>
                <td>{{$category->name}}</td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
