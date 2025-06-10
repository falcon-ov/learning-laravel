<?php

namespace App\Http\Controllers\Post;

use App\Http\Resources\Post\PostResource;
use  App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use  App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) //Controller
    {

        $data = $request->validated();               //-> Request

        $post = $this->service->store($data);               //-> Service -> Model

        return new PostResource($post);

        return redirect()->route('post.index');     //-> Route -> Controller --(Model)--> View
    }
}
