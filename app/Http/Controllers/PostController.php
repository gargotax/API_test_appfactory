<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function storePost(Request $request)
    {
        $post = Post::create([
            "title" => $request->input('title', 'xyz'),
            "body" => $request->input('body'),
            "owner_id"=> $request->input('owner_id'),
        ]);
        return $post;
    }

    public function readPost(Request $request, Post $post = null)
    {
        if($post)
        {
          // $author=Author::find($post->owner_id);

          //  $post->author=$author;

            return $post->load('author');
        }


        $posts = Post::query();
        if ($request->has('body'))
            $posts->where('body', $request->input('body'));

        if ($request->has('id'))
            $posts->where('id', $request->input('id'));


        if ($request->has('owner_id'))
         $posts->where('owner_id', $request->input('owner_id'));

        $posts=$posts->get();

        foreach ($posts as $post)
        {
            $author=Author::find($post->owner_id);

            $post->author=$author;

        }
        return $posts;
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
