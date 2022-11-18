@extends('layouts.admin')

@section('content')
  <!-- Admin content-->
<div class="admin-content">
     <x-users-buttons></x-users-buttons>
    <div class="content">
        <h2 class="page-title">Edit User</h2>
        <form action="{{ route('admin.users.update' ,['user' => $user->id ]) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="username">Username</label>
                <input type="text" name="name" value="{{ $user->name }}" class="text-input">
                <div>
                    @error('name')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"  class="text-input">
                <div>
                    @error('email')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
                </div>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password"  class="text-input">
                <div>
                        @error('password')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                        @enderror
                </div>
            </div>
            <div>
                <label for="password">Password Confirmation</label>
                <input type="password" name="password_confirmation"  class="text-input">
                <div>
                    @error('password_confirmation')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                        @enderror
                </div>
            </div>
                <div>
                <label>
                    <input type="checkbox" name="admin" @if($user->admin) checked @endif />
                    Admin
                </label>
            </div>
            <div>
                <button type="submit" name="updateUser" class="btn btn-big">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
