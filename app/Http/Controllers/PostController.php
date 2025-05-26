<?php

namespace App\Http\Controllers;

use  App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        echo "POST::all <br>";
        $posts = Post::all();
        foreach($posts as $post){
            echo $post."<br>";
        }

        echo "POST::where->first() <br>";
        $post_inp = Post::where('is_published', 0)->first();
        echo $post_inp;
    }
    public function create(){
        $posts= [
            [
                'title' => 'title test1',
                'content' => 'some content1',
                'image' => 'path_to_img',
                'likes' => 12345,
                'is_published' => 1,
            ],
            
            [
                'title' => 'title test2',
                'content' => 'some content2',
                'image' => 'path_to_img',
                'likes' => 9999,
                'is_published' => 1,
            ]
        ];

        foreach($posts as $post){
            Post::create($post);
        }

        Post::create([
            'title' => 'title test2',
            'content' => 'some content2',
            'image' => 'path_to_img',
            'likes' => 9999,
            'is_published' => 1,
        ]);

        dd("created");
    }

    public function update(){
        $post = Post::find(6);
        
        $post->update([
            'title' => $post->title." updated",
            'content' => $post->content." updated",
            'image' => $post->image." updated",
        ]);
        dd('updated');
    }

    public function delete(){
        $post = Post::find(6);
        $post->delete();
        dd('deleted');
    }

    public function restore(){
        $post = Post::withTrashed()->find(6);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate(){
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
        ],[
            'title' => 'CHECK firstOrCreate',
            'content' => 'some firstOrCreate',
            'image' => 'path_to_img',
            'likes' => 9999,
            'is_published' => 1,
        ]);

        dump($post->title);
        dd('finished');
    }
    public function updateOrCreate(){
        $anotherPost = [
            'title' => 'updateorcreate firstOrCreate',
            'content' => 'some firstOrCreate',
            'image' => 'path_to_img',
            'likes' => 9979,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate([
            'title' => 'title firstOrCreate',
        ],[
            'title' => 'updateorcreate firstOrCreate',
            'content' => 'some firstOrCreate',
            'image' => 'path_to_img',
            'likes' => 9979,
            'is_published' => 1,
        ]);
        
        dump($post->title);
    }
}
