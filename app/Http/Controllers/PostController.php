<?php

namespace App\Http\Controllers;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Levl;
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
         $posts = Post::filter($filter)->paginate(6);
        return view('posts.index', compact(['posts', 'types', 'subjects', 'levls' ]));

    }
    public function show($id) 
    {
        $post = Post::findOrFail($id);
        return view('posts.show', [
            "post" => $post,
        ]);
    }
    public function showStep($postId)
    {
        $steps = Step::where('post_id', $postId)->orderBy('order')->paginate(1); 
        return view('step.show', compact('steps')); 
    }
    // public function like(Post $post){
    //     auth()->user()->LikedPosts()->toggle($post->id);

    // }
}