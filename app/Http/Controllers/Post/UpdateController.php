<?php

namespace App\Http\Controllers\Post;

use  App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use  App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validate();

        $this->service->update($post, $data);

        return redirect()->route('post.show', $post->id);
    }
}
