<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::get();

       return view('post.home',compact('posts'));
    }
    public function postShow(Request $request)
    {
        $posts = Post::get();

        return response()->json($posts);
    }

    public function create()
    {
       return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);

        $post->save();

        return response()->json($post);

    }
    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where(['id'=> $id])->update([
            'title'=> $request->title,
            'body'=> $request->body,
        ]);

        return response()->json($post, 200);
    }


    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response()->json('successfully deleted');
    }
}
