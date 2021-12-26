<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index',[
            'posts'=>Post::latest()->paginate(50),
        ]);
    }
    public function create(){


        return view('admin.posts.create');

    }
    public function store(){

        $attributes = array_merge($this->validateRequest(),[
            'user_id'=>auth()->user()->id,
            'thumbnail'=> request()->file('thumbnail')->store('thumbnails')
        ]);

        Post::create($attributes);

        return redirect('/')->with('success','post is published successfully');
    }


    public function edit(Post $post){
        return view('admin.posts.edit',[
            'post'=>$post
        ]);
    }

    protected function validateRequest(?Post $post=null){

        $post??=new Post();

        return request()->validate([

            'title'=>['required'],
            'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
            'thumbnail'=>$post->exists?['image']:['image','required'],
            'excerpt'=>['required'],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);
    }

    public function update(Post $post){

        $attributes = $this->validateRequest($post);

        if(request()->file('thumbnail')??false){
            $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success','post is updated');
    }
    public function destroy(Post $post){

        $post->delete();

        return back()->with('success','post is deleted');

    }
    //
}
