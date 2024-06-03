<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
   public function showLoginForm()
   {
    return view("auth.login");
   }
   public function logout()
   {
    auth("web")->logout();
    return redirect(route("home"));
   }
   
   public function showRegisterForm(Request $request)
   {
    $roles = Role::get(['id', 'type']);
    return view("auth.register", compact('request', 'roles'));
   }
   public function login(Request $request)
   {
      $data = $request->validate([
        "email" => ["required", "email", "string"],
        "password"  => ["required"]
      ]);
        if(auth("web")->attempt($data)) {
          return redirect(route("home"));
        } 
        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }
   public function register(Request $request)
   {
      $data = $request->validate([
        "name" =>["required", "string", 'regex:/^[а-яА-я\s]+$/u'],
        "username" =>["required", "string", "unique:users,username"],
        "email" => ["required", "email", "string", "unique:users,email"],
        "password"  => ["required", "min:6", "confirmed"], 
        "role_id" => ["required", "integer"]
      ]);
      $user = User::create([
        "name" => $data["name"],
        "username" => $data["username"],
        "email" => $data["email"],
        "password" => bcrypt($data["password"]),
        "role_id" => intval($data["role_id"])

      ]);
      if($user){
        auth("web")->login($user);
      }
      return redirect(route("home"));
    }
}
 
