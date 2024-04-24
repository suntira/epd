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
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
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
    public function create()
{
    if (auth()->user()->role_id == 2) {
    $types= Type::get(['id','name' ]);
    $subjects= Subject::get(['id','name' ]);
    $levls= Levl::get(['id','name' ]);
    return view('posts.create',compact([ 'types', 'subjects', 'levls' ]) );
} else {
    return redirect()->route('home'); // перенаправляем пользователя на главную страницу
}
}
public function storePost(Request $request)
{
    $userId = auth()->id();
    $data = $request->validate([
        "name_post" =>["required", "string", 'regex:/^[а-яА-яA-Za-z\s]+$/u'],
        "description" =>["required", "string", 'regex:/^[а-яА-яA-Za-z\s]+$/u'],
        "img_title" => ["required",'image:jpg, jpeg, png'],
        "type_id" => ["required", "integer"],
        "subject_id" => ["required", "integer"],
        "levl_id" => ["required", "integer"],
      ]);
      if ($request->hasFile('img_title')) {
        $profileName = $request->file('img_title')->getClientOriginalName();
        $path = $request->file('img_title')->storeAs('img_title', $profileName, 'public');
        $data['img_title'] =  $path;
    }
    $post = Post::create([
        "user_id" => $userId,
        'name_post' => $request->input('name_post'),
        "description" =>$request->input('description'),
        "img_title" => $path,
        "type_id" => intval($data["type_id"]),
        "subject_id" => intval($data["subject_id"]),
        "levl_id" => intval($data["levl_id"]),
        "status_id" => 1,// Устанавливаем поле status_id в 1
        "created_at" => Carbon::now(), // Устанавливаем поле created_at на текущее время
    ]);
    return redirect()->route('posts.show', $post->id);
}
public function myPosts(){
    if (auth()->user()->role_id == 2) {
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('posts.my', compact('posts')); 
    } else {
        return redirect()->route('home');// отправляем пользователя на главную страницу 
    }
 }
public function createStepForm($postId)
{
    $post = Post::find($postId);
    $currentUser = auth()->user();
    if ($post && $currentUser->id === $post->user_id ) {
        if ($post->steps()->exists()) {
            $steps = Step::where('post_id', $postId)->orderBy('order')->paginate(1);
            return redirect()->route('step.show', ['postId' => $postId, 'steps' => $steps]);
        } else {
            return view('posts.steps.create', ['post' => $post,'postId' => $postId ]);
        }
    } else {
        return redirect()->route('home');
    }
}
public function storeStep(Request $request, $postId) {
    $post = Post::find($postId);
    $currentUser = auth()->user();

    if ($post && $currentUser->id === $post->user_id) {
        $data = $request->validate([
            'steps.*.text_st' => ['required', 'string', 'regex:/^[а-яА-яA-Za-z\s]+$/u'],
            'steps.*.img_st' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'steps.*.order' => ['required', 'integer']
        ]);

        $paths = [];

        foreach ($request->file('steps') as $step) {
            $profileName = $step['img_st']->getClientOriginalName();
            $path = $step['img_st']->storeAs('img_st', $profileName, 'public');
            $paths[] = $path;
        }

        foreach ($data['steps'] as $key => $step) {
            Step::create([
                'order' => $step['order'],
                'text_st' => $step['text_st'],
                'img_st' => $paths[$key],
                'post_id' => $postId
            ]);
        }

        return redirect()->route('posts.index')->with('success', 'Шаги успешно добавлены');
    } else {
        return redirect()->route('home')->with('error', 'Ошибка доступа');
    }
}
}