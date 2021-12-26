<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){


        // ddd(Gate::allows('admin'));
        // dd(auth()->user()->can('admin'));
        // dd(auth()->user()->cannot('admin'));
        // Gate::authorize('admin'); || $this->authorize('admin')


        return view('posts.index', [
            'posts' => Post::latest()->filter(request()->only('search','category','author'))->paginate(10)->withQueryString(),
        ]);
    }
    public function show(Post $post){

        return view('posts.show', [
        'post' => $post
    ]);

    }


    public function getPosts(){



        // $filters = request(['search','category']);




        // $posts =Post::latest()->with(['category', 'author']);
        // if(request('search')){
        //     $posts->where('title','like','%'.request('search').'%')
        //     ->orWhere('body','like','%'.request('search').'%')
        //     ->orWhere('excerpt','like','%'.request('search').'%');


        // }
        // return $posts->get();
    }

}
