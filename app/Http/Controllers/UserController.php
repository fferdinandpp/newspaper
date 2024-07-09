<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerForm()
    {
        // Implement logic to show register form
    }

    public function register(Request $request)
    {
        // Example: Register new user
        $user = User::create($request->all());
        return response()->json(['message' => 'User registered', 'user' => $user]);
    }

    public function loginForm()
    {
        // Implement logic to show login form
    }

    public function login(Request $request)
    {
        // Implement logic to handle user login
    }

    public function logout()
    {
        // Implement logic to handle user logout
    }

    public function index()
    {
        // Example: Fetch all users (for admin)
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function destroy($id)
    {
        // Example: Delete user by ID (for admin)
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }
}
