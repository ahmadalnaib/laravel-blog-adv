@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Users</th>
                <th scope="col">edit</th>
                <th scope="col">Delete</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        <a class="btn-link" href="{{route('users.edit',$user->id)}}">Edit</a>
                    </td>
                    <td>
                        <a class="btn-link" href="{{route('users.delete',$user->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
