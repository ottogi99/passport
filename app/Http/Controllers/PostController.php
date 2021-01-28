<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
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
        // writer(user) 테이블과 join이 필요
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required'],
            'contents' => ['required']
        ];

        $messages = [
            'required' => ':attribute은(는) 필수 입력 항목입니다.',
        ];

        $attributes = [
            'title' => '제목',
            'contents' => '내용'
        ];

        $this->validate($request, $rules, $messages, $attributes);

        $user = auth()->user();
        Log::info($user);

        $payload = array_merge($request->all(), [
          'writer' => $user->id,
        ]);

        try {
            $post = \App\Post::create($payload);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'message' => 'Not Found!',
            ], 404);
        }

        return response()->json([
            'post' => $post,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $post = \App\Post::findOrFail($id);

        try {
            $post->update($request->all());
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'message' => 'Not Found!',
            ], 404);
        }

        return response()->json([
            'post' => $post,
        ], 200);
    }

    public function destroy($id)
    {
        $post = \App\Post::findOrFail($id);
        // $this->authorize('delete-large-farmer', $farmer);
        $post->delete();

        return response()->json([], 204);
    }
}
