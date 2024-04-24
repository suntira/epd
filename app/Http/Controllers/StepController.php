<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Step;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $postId)
    {
           // Post id передается через URL и хранится в переменной $postId
           $post = Post::find($postId);
           // проверка существует ли пост с заданным id
           if(!$post) {
               return redirect()->back()->with('error', 'Пост не найден');
           }
           $validator = Validator::make($request->all(), [
            'text_st' => 'required|array',
            'text_st.*' => 'required|string',
            'order' => 'required|array',
            'order.*' => 'required|integer',
            'img_st.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // пример для валидации изображений
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
           // Создаем шаги для поста
           foreach($request->text_st as $key => $text) {
            $step = new Step();
            $step->post_id = $postId;
            $step->text_st = $text;
            $step->order = $request->order[$key];
 
            if($request->hasFile('img_st') && $request->file('img_st')[$key]->isValid()) {
                $imagePath = $request->file('img_st')[$key]->store('steps', 'public');
                $validator->setAttribute('img_st.' . $key, $imagePath);
            }
               $step->save();
           }
           return redirect()->route('post.show', ['postId' => $postId])->with('success', 'Шаги успешно созданы');
       }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
