<?php

namespace App\Http\Controllers\Post;

use  App\Http\Controllers\Controller;
use  App\Models\Tag;
use  App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends BaseController                     
{
    public function __invoke()
    {
        $categories = Category::all();                             
        $tags = Tag::all();                                        
        return view('post.create', compact('categories', 'tags'));
    }
}
