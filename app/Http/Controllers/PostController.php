<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    // public function index()
    // {
    //     $posts = Post::all();

    //     return response()->json([
    //         'posts' => $posts,
    //     ], 201);
    // }

    // 기간검색
    public function index(Request $request)
    {
        // if (!empty($request->get('start_date'))) {
        //     $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->get('start_date'));
        // } else {
        //     $start_date = Carbon::now();
        // }

        // if (!empty($request->get('end_date'))) {
        //     $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $request->get('end_date'));
        // } else {
        //     $end_date = $start_date->copy()->addMonths(1);
        // }

        // $posts = Post::whereBetween('created_at', [
        //     $start_date->startOfDay(),
        //     $end_date->endOfDay()
        // ])->orderBy('created_at', 'desc')->get();

        $posts = Post::all();

        return response()->json([
            'posts' => $posts,
        ], 201);
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
        ],201);//->setStausCode(201);

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

    //     return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
    // }

    //         'contents' => ['required']
    //     ];

    //     $messages = [
    //         'required' => ':attribute은(는) 필수 입력 항목입니다.',
    //     ];

    //     $attributes = [
    //         'title' => '제목',
    //         'contents' => '내용'
    //     ];

    //     $this->validate($request, $rules, $messages, $attributes);

    //     $user = auth()->user();
    //     Log::info($user);

    //     $payload = array_merge($request->all(), [
    //       'writer' => $user->id,
    //     ]);

    //     try {
    //         $post = \App\Post::create($payload);
    //     } catch (\Exception $e) {
    //         Log::error($e);

    //         return response()->json([
    //             'message' => 'Not Found!',
    //         ], 404);
    //     }

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
