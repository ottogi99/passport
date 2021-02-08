<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Nonghyup;

class NonghyupController extends Controller
{
    public function index(Request $request)
    {
        $query = Nonghyup::join('siguns', 'nonghyups.sigun', 'siguns.code')
                            ->select('nonghyups.*')
                            ->orderby('siguns.seq')
                            ->orderBy('seq');

        // if ($request->get('year')) {
        //     $query->where('year', $request->get('year'));
        // }

        Log::debug('sigun: '.$request->get('sigun'));        

        if ($request->get('sigun')) {
            $query->where('nonghyups.sigun', $request->get('sigun'));
        }

        if ($request->get('nonghyup')) {
            $query->where('nonghyups.code', $request->get('nonghyup'));
        }

        if ($request->get('q')) {
            $query->where('nonghyups.name', $request->get('q'));
        }


        // $posts = Post::whereBetween('created_at', [
        //     $start_date->startOfDay(),
        //     $end_date->endOfDay()
        // ])->orderBy('created_at', 'desc')->get();

        // $nonghyups = Nonghyup::all();
        // return response()->json([
        //     'nonghyups' => $nonghyups,
        // ], 201);

        $nonghyups = $query->get();

        // Log::debug($nonghyups);

        return response()->json([
            'nonghyups' => $nonghyups,
        ], 201);

    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug($request->all());

        // $rules = [
        //     'title' => ['required'],
        //     'content' => ['required', 'min:10'],
        // ];

        // $messages = [
        //     'title.required' => '제목은 필수 입력 항목입니다.',
        //     'content.required' => '본문은 필수 입력 항목입니다.',
        //     'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.'
        // ];

        // $validator = \Validator::make($request->all(), $rules, $messages);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        // 트레이트 메서드 사용
        // $this->validate($request, $rules, $message);

        $article = \App\Nonghyup::create($request->all());

        if (! $article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
        }

        return response()->json([
            'post' => $post,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        Log::debug($request->all());
        // Log::debug($request->get('sigun')['code']);
        // Log::debug($request->get('active')['code']);

        $sigun = [
            'sigun' => $request->get('sigun')['code'],
            'active' => $request->get('active')['code']
        ];
        Log::debug($sigun);
        $payload = array_merge($request->all(), $sigun);
        Log::debug($payload);

        $nonghyup = \App\Nonghyup::find($id);

        try {
            $nonghyup->update($payload);
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'message' => 'Not Found!',
            ], 404);
        }

        return response()->json([
            'nonghyup' => $nonghyup,
        ], 200);
    }


    public function destroy($id)
    {
        $nonghyup = \App\Nonghyup::find($id);
        // $this->authorize('delete-large-farmer', $farmer);
        $nonghyup->delete();

        return response()->json([], 204);
    }
}
