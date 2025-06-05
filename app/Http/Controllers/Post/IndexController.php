<?php

namespace App\Http\Controllers\Post;

use  App\Http\Requests\Post\FilterRequest;
use  App\Http\Controllers\Controller;
use  App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
        // $data = $request->validated();
        // $query = Post::query();
        // if (isset($data['id'])) {
        //     $query->where('id', $data['id']);
        // }
        // if (isset($data['category_id'])) {
        //     $query->where('category_id', $data['category_id']);
        // }
        // if (isset($data['title'])) {
        //     $query->where('title', 'like', "{$data['title']}%");
        // }
        // $posts = $query->get();
        // dd($posts);
    }
}
