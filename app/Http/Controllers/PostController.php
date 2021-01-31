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
        ], 201);
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
        ])->setStausCode(201);

        // return response()->setStatusCode(201);
    }


    public function store(Request $request)
    {
        $rules = [
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];

        $messages = [
            'title.required' => '제목은 필수 입력 항목입니다.',
            'content.required' => '본문은 필수 입력 항목입니다.',
            'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // 트레이트 메서드 사용
        // $this->validate($request, $rules, $message);

        $article = \App\User::find(1)->posts()->create($request->all());

        if (! $article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    }

}
