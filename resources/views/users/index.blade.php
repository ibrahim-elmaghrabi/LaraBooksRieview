@extends('layouts.admin')

@section('content')
  <!-- Admin content-->
        <div class="admin-content">
            <x-users-buttons></x-users-buttons>
             <div class="content">
                <h2 class="page-title">Manage Users</h2>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                          @foreach($users as $key => $user)
                            @if ($user->admin === 1)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if($user->admin === 1) Admin @else Author @endif </td>
                                <td><a href="{{ route('admin.users.edit' , ['user' => $user->id]) }}" class="edit">Edit</a></td>
                                <td></td>
                            </tr>
                            @else
                                <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>@if($user->admin === 1) Admin @else Author @endif </td>
                                <td><a href="{{ route('admin.users.edit' , ['user' => $user->id]) }}" class="edit">Edit</a></td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy' , ['user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="delete">Delete</button>
                                        </form>
                                    </td>
                            </tr>
                            @endif
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
@endsection
