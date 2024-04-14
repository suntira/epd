<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        $user = auth()->user();
        $posts = $user->post()->where('status_id', 2)->paginate(3);
        return view('user.show', ['user' => $user, 'posts' => $posts]);
    }
    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', ['user' => $user]);
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->bio = $request->input('bio');
        $user->username = $request->input('username');
        // Обновление других полей
        $user->save();
        return redirect()->route('user.show')->with('success', 'Profile updated successfully.');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $randomPosts = $user->post()->where('status_id', 2)->inRandomOrder()->limit(3)->get();
        return view('user.usershow', [
            'user' => $user,
            'randomPosts' => $randomPosts
        ]);
    }
}
