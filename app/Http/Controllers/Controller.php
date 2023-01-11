<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storePost(Request $request)
    {
        //Post sta per il Model

        $post = Post::create([
            "title" => $request->input('title', 'xyz'),
            "body" => $request->input('body'),
        ]);
        return $post;
    }

    public function readPost(Request $request, int $post_id = null)
    {
        $read = Post::query();
        if ($request->has('body'))
            $read->where('body', $request->input('body'));

        if ($request->has('id'))
            $read->where('id', $request->input('id'));


        /*if($post_id)
        {
            $read->where('id', $post_id);
        }*/
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
        //return Post::where('id', $request->input('id'))->delete();

       return $post->delete();

    }
}
