<?php

namespace App\Http\Controllers\Post;

use  App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use  App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) //Controller
    {
        $data = $request->validate();               //-> Request

        $this->service->store($data);               //-> Service -> Model

        return redirect()->route('post.index');     //-> Route -> Controller --(Model)--> View
    }
}
