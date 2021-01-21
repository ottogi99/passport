<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        // $post = Post::where('active', 1)->first();

        // return response()->json([
        //     'message' => 'Not Found!',
        // ], 404);

        return response()->json([
            'post' => $post,
        ]);

        // return response()->setStatusCode(201);
    }
}
