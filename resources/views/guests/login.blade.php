@extends('layouts.app')
@section('content')

<div class="auth-content">
    <form action="{{ route('users.authenticate') }}" method="POST">
        @csrf
        <h2 class="form-title">Login</h2>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="text-input">
            <div>
                @error('email')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
            </div>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" class="text-input">
            <div>
                    @error('password')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
            </div>
        </div>
        <div>
            <button type="submit" name="login-btn" class="btn btn-big">Login</button>
        </div>
        <p>Or <a href="register.php" style="font-weight: bold;">Sign Up</a></p>
    </form>
</div>


@endsection
