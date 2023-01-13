<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
      //  $title = "welcome";
        //Compact method:
       // return view('products.index', compact('title'));

        //With method:
        // return view('products.index')->with('title', $title);

        print_r(route('products'));
        return view ('products.index');

    }

    public function about(){
        return  'about page';
    }

    public function  show($name){
    $data=[
        'iphone'=>'iphone',
        'samsung'=>'samsung'
    ];

        return view('products.index', [
            'products' => $data[$name]
        ]);
    }
}
