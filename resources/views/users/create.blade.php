@extends('layouts.admin')

@section('content')
<div class="admin-content">
      <x-users-buttons></x-users-buttons>
    <div class="content">
        <h2 class="page-title">Add User</h2>
        <form action="{{ route('admin.users.store') }}" method="post">
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" name="name" value="{{ old('name') }}" class="text-input">
                 @error('name')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="text-input">
                 @error('email')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                    @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" class="text-input">
                 @error('password')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                    @enderror
            </div>
            <div>
                <label for="password">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="text-input">
                 @error('password_confirmation')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                    @enderror
            </div>
            <div>
                <label>Admin</label>
                 <input type="checkbox" name="admin" {{ old('admin') }} >
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-big">Add user</button>
            </div>
        </form>
    </div>
</div>
@endsection
