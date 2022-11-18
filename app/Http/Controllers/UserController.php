<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use Whoops\Run;

class UserController extends Controller
{
    public function index(){
        $users = User::all() ;

        return view('users.index' , ['users' => $users]) ;
    }

    public function create(){
         return view('users.create') ;
    }

    public function store(Request $request ){
        $data = $request->validate([
            'name' => ['required' , 'min:3'] ,
            'email' => ['required' , 'email' , 'unique:users,email' ] ,
            'password' => ['required' , 'confirmed' , 'min:6'] ,
        ]);
        $data['admin'] =(int)$request->has('admin') ? 1 : 0 ;
        $data['password'] = bcrypt($data['password']) ;
        User::create($data) ;
        return redirect('admin/users')->with('message' , 'User Created Successfully') ;

    }
    public function edit(User $user){

        return view('users.edit' , ['user' => $user]) ;
    }

    public function update(Request $request , User $user){
         $data = $request->validate([
            'name' => ['required' , 'min:3'] ,
            'email' => ['required' , 'email' ] ,
            'password' => ['required' , 'confirmed' , 'min:6'] ,
        ]);
        $data['admin'] =(int)$request->has('admin') ? 1 : 0 ;
        $data['password'] = bcrypt($data['password']) ;
        $user->update($data) ;
        return redirect('admin/users')->with('message' , 'User Updated Successfully') ;
    }

    public function destroy(User $user){
        $user->delete() ;
        return redirect('admin/users')->with('d-message' , 'User Deleted Successfully') ;
    }

    public function register(){
        return view('guests.register') ;
    }

    public function insertUser(Request $request){
        $data = $request->validate([
            'name' => ['required' , 'min:3'] ,
            'email' => ['required' , 'email' , 'unique:users,email' ] ,
            'password' => ['required' , 'confirmed' , 'min:6'] ,
        ]);
        $data['password'] = bcrypt($data['password']) ;
        $user = User::create($data) ;
        auth()->login($user) ;

        return redirect('/')->with('message' , 'User Created Successfully') ;

    }

    public function login(){
        return view('guests.login') ;
    }

    public function authenticate(Request $request){
        $data = $request->validate([
            'email' => ['required' , 'email' ] ,
            'password' => 'required' ,
        ]);
        if(auth()->attempt($data)){
            $request->session()->regenerate() ;
            return redirect('/') ;
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email') ;
    }

    public function logout(Request $request){
        auth()->logout() ;
        $request->session()->invalidate() ;
        $request->session()->regenerateToken() ;

        return redirect('/') ;
    }

}
