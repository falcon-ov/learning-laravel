<?php

namespace App\Http\Controllers\Admin\Post;

use  App\Http\Requests\Post\FilterRequest;
use  App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use  App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller //without BaseController
{
    public function __invoke()
    {
        dd(11111);
    }
}
