<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Admin Authentication

    // Show Form Login
    public function adminLoginForm()
    {
        return view('auth.admin.login');
    }

    // Login
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('admin_email', 'admin_password');

        if (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors('The provided credentials do not match our records.');
    }

    // Logout
    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    // User Management 
    
    // Show Users
    public function adminIndex()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Delete User
    public function adminDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    // User Authentication

    // Show Form Register
    public function userRegisterForm()
    {
        return view('auth.user.register');
    }

    // Register
    public function userRegister(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|string|email|max:255|unique:users',
            'user_password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_password' => bcrypt($request->user_password),
            'user_role' => 'user',
        ]);

        return redirect()->route('user.login');
    }

    // Show Form Login
    public function userLoginForm()
    {
        return view('auth.user.login');
    }

    // Login
    public function userLogin(Request $request)
    {
        $credentials = $request->only('user_email', 'user_password');

        if (Auth::attempt($credentials && Auth::user()->role === 'user')) {
            return redirect()->intended('/');
        }

        return back()->withErrors('The provided credentials do not match our records.');
    }

    // Logout
    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}