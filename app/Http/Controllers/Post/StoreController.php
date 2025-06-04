<?php

namespace App\Http\Controllers\Post;

use  App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use  App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validate();
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags); // привязываем в таблице связке к id поста id тэгов

        return redirect()->route('post.index');
    }
}
