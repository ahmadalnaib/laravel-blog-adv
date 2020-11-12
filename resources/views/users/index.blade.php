@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Users</th>
                <th scope="col">role</th>
                <th scope="col">Delete</th>
                <th scope="col">Image</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)



                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                      @if($user->admin)
                            <a href="{{route('users.notadmin',$user->id)}}">
                                Make User
                            </a>
                        @else
                            <a href="{{route('users.admin',$user->id)}}">
                                Make Admin
                            </a>
                          @endif

                    </td>
                    <td>
                        <a class="btn-link" href="{{route('users.delete',$user->id)}}">Delete</a>
                    </td>
                    <td>
                        <img height="100px" width="100px" class="img-thumbnail" src="{{asset('uploads/avatar/user.png')}}" alt="">
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
