<?php

namespace App\Http\Controllers;

use  App\Models\Post;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('contacts', compact('posts'));
    }
}
 