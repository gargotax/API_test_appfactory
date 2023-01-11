<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function storePost(Request $request)
    {
        $post = Post::create([
            "title" => $request->input('title', 'xyz'),
            "body" => $request->input('body'),
        ]);
        return $post;
    }

    public function readPost(Request $request, Post $post = null)
    {
        if($post)
            return $post;

        $read = Post::query();
        if ($request->has('body'))
            $read->where('body', $request->input('body'));

        if ($request->has('id'))
            $read->where('id', $request->input('id'));

        return $read->get();
    }

    public function updatePost(Request $request, Post $post)
    {

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return $post;

    }

    public function deletePost(Request $request, Post $post)
    {
        return $post->delete();

    }
}
