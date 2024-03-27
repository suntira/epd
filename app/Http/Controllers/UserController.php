<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        $user = auth()->user();
        return view('user.show', ['user' => $user]);
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
        // Обновление других полей
        $user->save();
        return redirect()->route('user.show')->with('success', 'Profile updated successfully.');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.usershow', [
            'user' => $user,
        ]);
    }
}
