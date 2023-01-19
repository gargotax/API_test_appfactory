<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthorsController extends Controller
{
    //

    public function newAuthor(Request $request)
    {
        $author= Author::create([
            "name"=> $request->input('name', 'xyz'),
            "lastname"=>$request->input('lastname', 'xyz'),
            "birthday"=>$request->input('birthday'),
        ]);

        return $author;

    }

    public function findAuthor(Request $request, Author $findAuthor=null)
    {
        if($findAuthor)
        {
            return $findAuthor;
        }

        $findAuthor = Author::query();
        if($request->has('name'))
        {
            $findAuthor->where('name', $request->input('name'));
        }

        if($request->has('lastname'))
        {
            $findAuthor->where('lastname', $request->input('lastname'));
        }

        if($request->has('birthday')){
            $findAuthor->where('birthday', $request->input('birthday'));
        }
        return $findAuthor->get();
    }

    public function modifyAuthor (Request $request, Author $modifyauthor)
    {

        /*

         $params = $request->all();

        foreach ($params as $key=> $value)
        {
            $modifyauthor->$key=$value;
        }
        */
        $modifyauthor->fill( $request->all());

        $modifyauthor->save();
        return $modifyauthor;



    }
    public function deleteAuthor(Request $request, Author $deleteauthor)
    {
        return $deleteauthor->delete();
    }

}
