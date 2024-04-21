<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Levl;
use App\Models\User;
use App\Models\Status;
use App\Models\Subject;
use App\Models\Type;
use App\Models\Favorite;


class PostController extends Controller
{
    public function index(FilterRequest $request)
    {   $levls = Levl::all();
        $types = Type::all();
        $subjects = Subject::all();
        $data = $request->validated();
         $filter = app()->make(PostFilter::class, ['queryParams' =>array_filter($data)]);
         $posts = Post::where('status_id', 2)
         ->filter($filter)
         ->orderBy('created_at', 'desc')
         ->paginate(6);
        return view('posts.index', compact(['posts', 'types', 'subjects', 'levls' ]));
    }
    public function show($id) 
    {
        $user = auth()->user();
        $post = Post::findOrFail($id);
        return view('posts.show', [
            "post" => $post,
            'user'=> $user
        ]);
    }
    public function showStep($postId)
    {
        $steps = Step::where('post_id', $postId)->orderBy('order')->paginate(1); 
        return view('step.show', compact('steps')); 
    }
    public function like(Post $post){
      auth()->user()->favorites()->toggle($post->id);
       return redirect()->back();
     }
     public function showFavorites($userId)
     {
        $user = User::findOrFail($userId);
         $favorites = $user->favorites()->paginate(6);
         $currentUser = auth()->user(); // Получаем текущего аутентифицированного пользователя
    
         // Проверяем, соответствует ли текущий пользователь запрашиваемому userId
         if ($currentUser->id == $userId) {
             // Если нет, возвращаем сообщение об ошибке или перенаправляем на другую страницу
             
             return view('posts.favorites', ['user' => $user, 'favorites' => $favorites]);
         } else{
            return redirect()->route('user.show')->with('error', 'У вас нет доступа к избранным постам других пользователей');
         }
     
     }
}