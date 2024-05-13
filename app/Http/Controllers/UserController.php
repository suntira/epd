<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function profile(){
        $user = auth()->user();
        $favorites = $user->favorites()->where('status_id', 2)->paginate(3);
        $posts = $user->post()->where('status_id', 2)->paginate(3);
        return view('user.show', ['user' => $user, 'posts' => $posts, 'favorites' => $favorites]);
    }
    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', ['user' => $user]);
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            "name" =>["required", "string", 'regex:/^[а-яА-я\s]+$/u'],
            'username' => ['required', 'string',Rule::unique('users')->ignore($user->id)],
            'bio' => ['max:200'],
            'profile' => ['image:jpg, jpeg, png']
          ], [
            "name.required" => "Поле имя обязательно для заполнения",
            "name.string" => "Имя должно быть строкой",
            "name.regex" => "Имя должно содержать только Кирилицу и пробелы",
            "username.required" => "Поле имя пользователя обязательно для заполнения",
            "username.string" => "Имя пользователя должно быть строкой",
            "username.unique" => "Это имя пользователя уже занято"
          ]);
          if ($request->hasFile('profile')) {
            $profileName = $request->file('profile')->getClientOriginalName();
            $path = $request->file('profile')->storeAs('profile', $profileName, 'public');
            $validated['profile'] =  $path;
        }
        $user->update($validated);
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
  // $user->name = $request->input('name');
        // $user->bio = $request->input('bio');
        // $user->username = $request->input('username');
        // Обновление других полей