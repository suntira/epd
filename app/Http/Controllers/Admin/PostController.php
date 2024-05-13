<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use App\Models\Step;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('status_id', 1)
        ->orderBy('created_at', 'asc')
        ->paginate(10);
        return view("admin.posts.index",compact(['posts']));
    }
    public function accept($id)
    {
        $post = Post::find($id);
        $post->status_id = 2;
        $post->save();
        return redirect()->back(); // возвращаем обратно на предыдущую страницу
    }
    public function reject($id)
{
    $post = Post::find($id);
    $post->status_id = 3;
    $post->save();
    return redirect()->back(); // возвращаем обратно на предыдущую страницу
}
public function show($id) 
{
    $post = Post::findOrFail($id);
    return view('admin.posts.show', [
        "post" => $post,
    ]);
}
public function showStep($postId)
{
    $post = Post::find($postId);
    $steps = Step::where('post_id', $postId)->orderBy('order')->paginate(1); 
        return view('admin.step.show', compact('steps'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
