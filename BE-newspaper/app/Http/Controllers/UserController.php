<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if ($request->hasFile('image')) {
            // Remove the old image if exists
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('user_images');
            $user->image = $imagePath;
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    public function destroy(User $user)
    {
        // Remove the image if exists
        if ($user->image) {
            Storage::delete($user->image);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
