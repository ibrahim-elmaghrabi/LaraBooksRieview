@extends('layouts.app')
@section('content')

  <div class="auth-content">
    <form action="{{ route('users.insert') }}" method="POST" >
        @csrf
        <h2 class="form-title">Register</h2>
        <div>
            <label for="username">Username</label>
            <input type="text" name="name" value="{{ old('name') }}"class="text-input">
            <div>
                @error('name')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
            </div>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"  class="text-input">
            <div>
                @error('email')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
            </div>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" value="" class="text-input">
            <div>
                @error('password')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
            </div>
        </div>
        <div>
            <label for="password">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="text-input">
            <div>
                @error('password_confirmation')
                        <p class="text-red-500">{{ '*'.$message }}</p>
                 @enderror
            </div>
        </div>
        <div>
            <button type="submit" name="register-btn" class="btn btn-big ">Register</button>
        </div>
               <p>Or <a href="login.php" style="font-weight: bold;">Sign In</a></p>
    </form>

  </div>

@endsection
