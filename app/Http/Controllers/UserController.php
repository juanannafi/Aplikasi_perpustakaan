<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginForm(){
        return view('user.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = auth()->user();

            if($user->role == "admin"){
                return redirect('/buku');
            }
        }

        return back()->withErrors("Email / Password Salah, Silahkan Coba Lagi");
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function index(){
        $user = User::all();
        return view('users/user', compact('user'));

    }

    public function create(){
        $user = User::all();
        return view('users/create');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        $user = Auth::user();
        $create = User::create([
            'name'=> $validated["name"],
            'email'=>$validated["email"],
            'password'=> Hash::make($validated["password"]),
            'role'=>$validated["role"],  
        ]);

        
        if(!$create){
            return back()->withErrors(['create' => 'Gagal menyimpan User!']);
        }

        return redirect('/users');
    }
    
}
