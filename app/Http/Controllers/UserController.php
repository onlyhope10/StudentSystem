<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{   
    


    public function login(){
        if(View::exists('user.login')){
            return view('user.login');
        }else{
            return abort(404);
        }
    }

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back!');
        }
        return back()->withErrors(['email' => 'Login Failed!'])->onlyInput('email');
    }

    public function register(){
        return view('user.register');
        
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout successful');
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);
        auth()->login($user);

        return redirect('/')->with('message', 'Successfully Registered');
    }

    

    public function show($id){
        $data = ["data" => "data from database"];
        return view('user')
        ->with('name', 'hopia')
        ->with('data', $data)
        ->with('age', 22)
        ->with('email', 'hopia@email.com')
        ->with('id', $id);
    }
}
