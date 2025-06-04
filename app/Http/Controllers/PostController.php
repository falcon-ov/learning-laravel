<?php

namespace App\Http\Controllers;

use  App\Models\Category;
use  App\Models\Post;
use  App\Models\PostTag;
use  App\Models\Tag;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        $post = Post::find(1);
        $category = Category::find(1);
        $tag = Tag::find(1);
        dd($post->tags);

        return view('post.index', compact('posts'));

        // $post = Post::find(1);
        // $tag = Tag::find(1);

        // $category = Category::find(1);

        // dump($category->posts);
        // dump($post->category);
        // dump($post->tags);
        // dump($tag->posts);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'integer',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags); // привязываем в таблице связке к id поста id тэгов

        // foreach($tags as $tag){
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id,
        //     ]);
        // }

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories','tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'integer',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(6);
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }


    public function restore()
    {
        $post = Post::withTrashed()->find(6);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate()
    {
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'title firstOrCreate',
            'content' => 'some firstOrCreate',
            'image' => 'path_to_img',
            'likes' => 9999,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'title firstOrCreate',
        ], [
            'title' => 'CHECK firstOrCreate',
            'content' => 'some firstOrCreate',
            'image' => 'path_to_img',
            'likes' => 9999,
            'is_published' => 1,
        ]);

        dump($post->title);
        dd('finished');
    }
    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'updateorcreate firstOrCreate',
            'content' => 'some firstOrCreate',
            'image' => 'path_to_img',
            'likes' => 9979,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'title firstOrCreate',
        ], [
            'title' => 'updateorcreate firstOrCreate',
            'content' => 'some firstOrCreate',
            'image' => 'path_to_img',
            'likes' => 9979,
            'is_published' => 1,
        ]);

        dump($post->title);
    }
}
